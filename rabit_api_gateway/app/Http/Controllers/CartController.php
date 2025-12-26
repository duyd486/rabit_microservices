<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Facades\JWTAuth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{
            $userId = JWTAuth::parseToken()->getPayload()->get('sub');
            $response = Http::get(
                config('services.cart.base_url') . '/api/index?userId=' . $userId
            );
            return $response->json();
        } catch(\Throwable $th){
            ApiResponse::internalServerError($th);
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
            $validated = $request->validate([
                'product_id' => ['required'],
                'update_type' => ['required'],
                'quantity' => ['nullable'],
            ]);
            $userId = JWTAuth::parseToken()->getPayload()->get('sub');

            $validated['user_id'] = $userId;

            $response = Http::post(
                config('services.cart.base_url') . '/api/update',
                $validated
            );

            return $response->json();
        }
        catch(\Throwable $th){
            return ApiResponse::internalServerError($th);
        }
    }

    public function clear(Request $request){
        try{
            $userId = JWTAuth::parseToken()->getPayload()->get('sub');

            $response = Http::get(
                config('services.cart.base_url') . '/api/clear',
                ['user_id' => $userId]
            );
            return $response->json();
        } catch(\Throwable $th){
            return ApiResponse::internalServerError($th);
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
