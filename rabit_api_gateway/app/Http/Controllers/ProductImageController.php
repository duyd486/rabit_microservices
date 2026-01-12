<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductImageController extends Controller
{

    public function getImages($productId) {
        $images = DB::table('product_image')
            ->where('product_id', $productId)
            ->pluck('image_url');

        $fullUrls = $images->map(fn($path) => env('APP_URL') . '/' . $path);

        return response()->json($fullUrls);
    }
}
