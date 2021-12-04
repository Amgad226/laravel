<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ThirdController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    
    echo"Hi ";
});


Route::post('/products',[ProductController::class,'createProduct']);
Route::get('/products',[ProductController::class,'ListAllProducts']);
Route::delete('/products/{productId}',[ProductController::class,'deleteProductById']);
Route::post('/products/{productId}',[ProductController::class,'updateProduct']);



Route::get('/check_id', [ThirdController::class, 'check'])->middleware(['check_user']);
Route::delete('/delete_by_id', [ThirdController::class, 'check'])->middleware(['delete_id']);
