<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
