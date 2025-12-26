<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{
            $params = $request->all();
            $userId = $params['userId'];

            $cartItems = Cart::where('user_id', $userId)->get();

            $cartMap = $cartItems->keyBy('product_id');

            $productIds = $cartItems->pluck('product_id')->unique()->values();

            $response = Http::post(
                'http://products_web:80/api/products/by-ids',
                [
                    'ids' => $productIds
                ]
            );

            if (!$response->successful()) {
                return ApiResponse::success("Service Product lỗi");
            }

            $products = collect($response->json());

            $result = $products->map(function ($product) use ($cartMap) {
                return [
                    'product' => $product,
                    'quantity' => $cartMap[$product['id']]->quantity
                ];
            });

            return ApiResponse::success($result);
        } catch(\Throwable $th){
            return ApiResponse::internalServerError($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
            $params = $request->validate([
                'user_id' => ['required'],
                'product_id' => ['required'],
                'update_type' => ['required'],
                'quantity' => ['nullable'],
            ]);

            $message = '';

            $userId = $params['user_id'] ?? null;
            $productId = $params['product_id'] ?? null;

            if (!$userId || !$productId) {
                return ApiResponse::internalServerError('Thiếu userId hoặc product_id');
            }

            switch ($params['update_type'] ?? 'default') {
                case 'add':
                    $this->add($userId, $productId);
                    $message = 'Thêm thành công';
                    break;

                case 'minus':
                    $this->minus($userId, $productId);
                    $message = 'Giảm thành công';
                    break;

                case 'change':
                    $this->changeQuantity(
                        $userId,
                        $productId,
                        $params['quantity'] ?? 1
                    );
                    $message = 'Cập nhật thành công';
                    break;

                case 'delete':
                    $this->delete($userId, $productId);
                    $message = 'Xóa thành công';
                    break;

                default:
                    $message = 'Hành động không hợp lệ';
                    break;
            }

            return ApiResponse::success($message);
        } catch(\Throwable $th){
            return ApiResponse::internalServerError("Cart Service lỗi");
        }
    }


    public function clearProducts(int $userId)
    {
        Cart::where('user_id', $userId)->delete();
    }

    private function changeQuantity(int $userId, int $productId, int $quantity)
    {
        if ($quantity < 1) {
            return $this->delete($userId, $productId);
        }

        Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->update([
                'quantity' => $quantity
            ]);
    }

    private function add(int $userId, int $productId)
    {
        $item = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => 1
            ]);
        }
    }

    private function minus(int $userId, int $productId)
    {
        $item = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if (!$item) {
            return;
        }

        if ($item->quantity <= 1) {
            $this->delete($userId, $productId);
        } else {
            $item->decrement('quantity');
        }
    }

    private function delete(int $userId, int $productId)
    {
        Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->delete();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
