<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function status(Request $request){
        try{
            $orderCode = $request->input('order_code');
            $response = Http::get(
                config('services.payment.base_url') . '/api/payos/status',
                ['order_code' => $orderCode]
            );
            return $response->json();
        } catch(\Throwable $th){
            return ApiResponse::internalServerError($th->getMessage());
        }
    }
}
