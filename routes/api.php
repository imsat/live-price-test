<?php

use App\Http\Controllers\AmazonProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/amazon/product/{ean}', [AmazonProductController::class, 'getProductByEAN']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
