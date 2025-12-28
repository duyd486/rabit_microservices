<?php

use App\Http\Controllers\PayOsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'payos'], function(){
    Route::post('payment-link', [PayOsController::class, 'createPaymentLink']);
});
