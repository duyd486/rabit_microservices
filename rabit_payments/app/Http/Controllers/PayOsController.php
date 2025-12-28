<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
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
            return ApiResponse::internalServerError($th);
        }
    }
}
