<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('products')->group(function () {
    Route::get('index', [ProductController::class, 'index']);
    Route::get('show/{id}', [ProductController::class, 'show']);
    Route::get('similiar/{id}', [ProductController::class, 'similiar']);
    Route::post('by-ids', [ProductController::class, 'showByIds']);
});

Route::prefix('categories')->group(function () {
    Route::get('index', [CategoryController::class, 'index']);
});