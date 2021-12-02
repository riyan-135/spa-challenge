<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
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


Route::post('/product', [ProductController::class, 'store']);
Route::get('/product/index', [ProductController::class, 'index']);
Route::get('/delete/{id}', [ProductController::class, 'delete']);
Route::post('/update/{id}', [ProductController::class, 'update']);
Route::get('/edit/{id}', [ProductController::class, 'edit']);
