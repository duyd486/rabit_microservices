<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\BillController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'address'], function(){
    Route::get('index', [AddressController::class, 'index']);
    Route::post('store', [AddressController::class, 'store']);
    Route::post('update/{id}', [AddressController::class, 'update']);
    Route::get('destroy/{id}', [AddressController::class, 'destroy']);
});

Route::group(['prefix' => 'bill'], function(){
    Route::get('index', [BillController::class, 'index']);
    Route::post('store', [BillController::class, 'store']);
});
