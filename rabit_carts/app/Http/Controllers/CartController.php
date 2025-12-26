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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
