<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductImageController extends Controller
{
    public function uploadImages($productId, Request $request) {
        $folder = "galleries/product_" . $productId;
        $savedFiles = [];

        foreach ($request->file('images') as $image) {
            $filename = $image->getClientOriginalName();
            $image->move(public_path($folder), $filename);
            $savedFiles[] = $folder . '/' . $filename;
        }

        return response()->json($savedFiles);
    }

    public function getImages($productId) {
        $images = DB::table('product_image')
            ->where('product_id', $productId)
            ->pluck('image_url');

        $fullUrls = $images->map(fn($path) => env('APP_URL') . '/' . $path);

        return response()->json($fullUrls);
    }
}
