<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\BillController;
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

    Route::group(['prefix' => 'address'], function(){
        Route::get('list-address', [AddressController::class, 'index']);
        Route::get('add-address', [AddressController::class, 'store']);
        Route::get('update-address/{id}', [AddressController::class, 'update']);
        Route::get('delete-address/{id}', [AddressController::class, 'destroy']);
    });

    Route::group(['prefix' => 'bill'], function(){
        Route::post('create-bill', [BillController::class, 'store']);
        Route::get('index', [BillController::class, 'index']);
    });
});


Route::prefix('product')->group(function () {
    Route::get('show/{id}', [ProductController::class, 'show']);
    Route::get('similar-products/{id}', [ProductController::class, 'similiar']);
});

Route::get('list-product', [ProductController::class, 'index']);
Route::get('list-category', [CategoryController::class, 'index']);