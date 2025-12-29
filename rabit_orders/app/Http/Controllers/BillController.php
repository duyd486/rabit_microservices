<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Bill;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $params = $request->validate([
                'user_id' => ['required'],
            ]);

            $userId = $params['user_id'];

            $bills = Bill::where('user_id', $userId)
                ->with('orderItems')
                ->get();

            if ($bills->isEmpty()) {
                return ApiResponse::success([]);
            }

            $productIds = $bills
                ->pluck('orderItems')
                ->flatten()
                ->pluck('product_id')
                ->unique()
                ->values();

            $response = Http::timeout(5)->post(
                'http://products_web:80/api/products/by-ids',
                [
                    'ids' => $productIds,
                    'fields' => 'name, price',
                ]
            );

            if (!$response->successful()) {
                return ApiResponse::badRequest('Cannot get products from product service');
            }

            $products = collect($response->json('data'))->keyBy('id');

            // Inject product info vào order items
            $bills->transform(function ($bill) use ($products) {
                $bill->order_items = $bill->orderItems->map(function ($item) use ($products) {
                    $product = $products->get($item->product_id);

                    return [
                        'id' => $item->id,
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                        'total_price' => $item->total_price,

                        // dữ liệu từ product service
                        'product_name' => $product['name'] ?? null,
                        'product_price' => $product['price'] ?? null,
                    ];
                });

                unset($bill->orderItems);
                return $bill;
            });

            return ApiResponse::success($bills);

        } catch (\Throwable $th) {
            return ApiResponse::internalServerError($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $params = $request->validate([
                'user_id' => ['required'],
                'address' => ['required'],
                'items' => ['required'],
                'method' => ['required'],
            ]);

            $userId = $params['user_id'];
            $address = $params['address'];
            $items = $params['items'];
            $method = $params['method'];

            $totalBillPrice = 0;

            // Lấy product ids
            $productIds = collect($items)->pluck('id')->unique()->values();

            // Call Product Service
            $response = Http::timeout(5)->post(
                'http://products_web:80/api/products/by-ids',
                [
                    'ids' => $productIds,
                    'fields' => 'name, price',
                ]
            );

            if (!$response->successful()) {
                return ApiResponse::badRequest('Cannot get products from product service');
            }

            $productsFromService = collect($response->json('data'))->keyBy('id');

            // Tạo bill
            $bill = Bill::create([
                'address' => $address,
                'total_price' => 0,
                'order_code' => intval(substr(strval(microtime(true) * 10000), -6)),
                'user_id' => $userId,
            ]);


            // Xử lý từng item
            foreach ($items as $item) {
                if (!$productsFromService->has($item['id'])) {
                    return ApiResponse::badRequest("Product {$item['id']} not found");
                }

                $product = $productsFromService[$item['id']];
                $totalPrice = $product['price'] * $item['quantity'];

                OrderItem::insert([
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'total_price' => $totalPrice,
                    'bill_id' => $bill->id,
                ]);

                $products[] = [
                    'name' => $product['name'],
                    'quantity' => $item['quantity'],
                    'price' => $totalPrice,
                ];

                $totalBillPrice += $totalPrice;
            }

            $bill->total_price = $totalBillPrice;

            if($method === 'online'){
                $bill->status = 1;
                $bill->save();
                // Call Payment Service
                // return $this->createPaymentLink($bill, $products);
                $payload = [
                    'order_code' => $bill->order_code,
                    'amount' => $bill->total_price,
                    'description' => "Thanh toán hóa đơn {$bill->order_code}",
                    'items' => $products,
                    'return_url' => 'http://google.com',
                    'cancel_url' => 'http://chatgpt.com',
                ];
                $response = Http::post(
                    'http://payments_web:80/api/payos/payment-link',
                    $payload
                );

                // if (!$response->successful()) {
                //     throw new \Exception('Cannot create payment link');
                // }

                return ApiResponse::success([
                    'bill' => $bill,
                    'payment' => $response->json(),
                ]);

            } else {
                $bill->status = Bill::STATUS_PENDING;
                $bill->save();
            }

            return ApiResponse::success($bill);
        }catch(\Throwable $th){
            return ApiResponse::internalServerError($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try{
            $orderCode = $request->input('order_code');
            $status = $request->input('status');

            $bill = Bill::where('order_code', $orderCode)->first();

            switch ($status) {
                case 'PAID':
                    $bill->status = Bill::STATUS_PAID;
                    break;

                case 'PENDING':
                    $bill->status = Bill::STATUS_PENDING;
                    break;

                case 'PROCESSING':
                    $bill->status = Bill::STATUS_PROCESSING;
                    break;

                case 'FAILED':
                default:
                    $bill->status = Bill::STATUS_FAILED;
                    break;
            }
            $bill->save();
            return ApiResponse::success($bill);
        } catch (\Throwable $th) {
            return ApiResponse::internalServerError($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
