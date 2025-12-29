<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Tymon\JWTAuth\Facades\JWTAuth;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $userId = JWTAuth::parseToken()->getPayload()->get('sub');
            $response = Http::get(
                config('services.order.base_url') . '/api/bill/index?user_id=' . $userId
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
            $validated = $request->validate([
                'address' => ['required'],
                'items' => ['required'],
                'method' => ['nullable'],
            ]);

            $userId = JWTAuth::parseToken()->getPayload()->get('sub');

            $response = Http::post(
                config('services.order.base_url') . '/api/bill/store?user_id=' . $userId,
                $validated
            );
            return $response->json();
        } catch(\Throwable $th){
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
