<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ProductImageController extends Controller
{
    public function saveImagePaths($productId, Request $request) {
    $gatewayUrl = env('GATEWAY_SERVICE_URL') . "/upload-product-images/" . $productId;

    $response = Http::attach(
        'images', $request->file('images')
    )->post($gatewayUrl);

    $imagePaths = $response->json();

    foreach ($imagePaths as $path) {
        DB::table('product_image')->insert([
            'product_id' => $productId,
            'image_url' => $path
        ]);
    }

    return response()->json(["message" => "Lưu path thành công"]);
}

}
