<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use PayOS\PayOS;

class PayOsController extends Controller
{
    private $payOS;

    public function __construct()
    {
        $this->payOS = new PayOS(
            clientId: getenv('PAYOS_CLIENT_ID'),
            apiKey: getenv('PAYOS_API_KEY'),
            checksumKey: getenv('PAYOS_CHECKSUM_KEY')
        );
    }

    public function createPaymentLink(Request $request){
        try{
            $data = $request->validate([
                'order_code' => ['required'],
                'amount' => ['required', 'numeric'],
                'description' => ['required'],
                'items' => ['required', 'array'],
                'return_url' => ['required', 'url'],
                'cancel_url' => ['required', 'url'],
            ]);

            $res = $this->payOS->createPaymentLink([
                'orderCode' => $data['order_code'],
                'amount' => $data['amount'],
                'description' => $data['description'],
                'items' => $data['items'],
                'returnUrl' => $data['return_url'],
                'cancelUrl' => $data['cancel_url'],
                'expiredAt' => now()->addMinutes(10)->timestamp,
            ]);

            return ApiResponse::success($res);
        } catch(\Throwable $th){
            return ApiResponse::internalServerError($th->getMessage());
        }
    }


    public function status(Request $request){
        try{
            $orderCode = $request->input('order_code');

            $data = $this->payOS->getPaymentLinkInformation($orderCode);
            
            if (!$data || empty($data['status'])) {
                Log::error('PayOS getPaymentLinkInformation failed', [
                    'order_code' => $orderCode,
                    'response' => $data
                ]);

                return ApiResponse::internalServerError('Cannot get payment status');
            }

            $payload = [
                'order_code' => $orderCode,
                'status' => $data['status'],
            ];

            $response = Http::timeout(3)->get(
                'http://orders_web:80/api/bill/update',
                $payload
            );

            return ApiResponse::success($data);
        }catch(\Throwable $th){
            return ApiResponse::internalServerError($th->getMessage());
        }
    }


}
