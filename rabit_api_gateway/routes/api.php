<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('jwt.auth')->group(function() {

    Route::prefix('cart')->group(function () {
        Route::get('list-product', [CartController::class, 'index']);
        Route::get('update-product', [CartController::class, 'update']);
        Route::get('clear-cart', [CartController::class, 'clear']);
    });

    Route::prefix('address')->group(function () {
        
    });


    Route::prefix('bill')->group(function () {
        
    });

});


Route::prefix('product')->group(function () {
    Route::get('show/{id}', [ProductController::class, 'show']);
    Route::get('similar-products/{id}', [ProductController::class, 'similiar']);
});

Route::get('list-product', [ProductController::class, 'index']);
Route::get('list-category', [CategoryController::class, 'index']);