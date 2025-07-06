<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\Api\CartController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/get-all-category',[APIController::class,'getAllCategory']);
Route::get('/get-all-trendingProducts',[APIController::class,'getAllTrendingProduct']);
Route::get('/get-all-CategoryProducts/{id}',[APIController::class,'getAllCategoryProduct']);
Route::get('/get-product-details/{id}',[APIController::class,'getProductDetail']);
Route::post('/add-to-cart',[CartController::class,'addToCart']);
Route::get('/cart', [CartController::class, 'index']);
 