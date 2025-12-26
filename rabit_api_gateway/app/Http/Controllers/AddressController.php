<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Http;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $userId = JWTAuth::parseToken()->getPayload()->get('sub');
            $response = Http::get(
                config('services.order.base_url') . '/api/address/index',
                ['user_id' => $userId]
            );
            return $response->json();
        } catch(\Throwable $th){
            return ApiResponse::internalServerError($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $userId = JWTAuth::parseToken()->getPayload()->get('sub');
            $validated = $request->validate([
                'addresses' => ['required'],
                'phone' => ['required'],
            ]);
            $validated['user_id'] = $userId;
            $response = Http::post(
                config('services.order.base_url') . '/api/address/store',
                $validated
            );
            return $response->json();
        } catch(\Throwable $th){
            return ApiResponse::internalServerError($th);
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
    public function update(Request $request, string $id)
    {
        try{
            $userId = JWTAuth::parseToken()->getPayload()->get('sub');
            $validated = $request->validate([
                'addresses' => ['required'],
                'phone' => ['required'],
            ]);
            $response = Http::post(
                config('services.order.base_url') . '/api/address/update/' . $id,
                $validated
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
        try{
            $response = Http::get(
                config('services.order.base_url') . '/api/address/destroy/' . $id
            );
            return $response->json();
        } catch(\Throwable $th){
            return ApiResponse::internalServerError($th);
        }
    }
}
