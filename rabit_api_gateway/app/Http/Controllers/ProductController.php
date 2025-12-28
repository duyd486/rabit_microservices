<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{
            $params = $request->all();
            $response = Http::get(
                config('services.product.base_url') . '/api/products/index',
                $params
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $response = Http::get(
                config('services.product.base_url') . '/api/products/show/' . $id
            );
            
            if ($response->failed()) {
                return response()->json(
                    $response->json(),
                    $response->status()
                );
            }
            return response()->json(
                $response->json(),
                $response->status()
            );
        } catch(\Throwable $th){
            return ApiResponse::internalServerError($th);
        }
    }

    public function similiar(Request $request, string $id){
        try{
            $params = $request->all();
            $response = Http::get(
                config('services.product.base_url') . '/api/products/similiar/' . $id,
                $params
            );
            
            if ($response->failed()) {
                return response()->json(
                    $response->json(),
                    $response->status()
                );
            }
            return response()->json(
                $response->json(),
                $response->status()
            );
        } catch(\Throwable $th){
            return ApiResponse::internalServerError($th);
        }
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
