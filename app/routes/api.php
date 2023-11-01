<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/warehouses', [\App\Http\Controllers\WarehousesController::class, 'index']);
Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'index']);
Route::post('/orders', [\App\Http\Controllers\OrderController::class, 'store']);
Route::put('/orders/{id}', [\App\Http\Controllers\OrderController::class, 'update']);

Route::put('/orders/{id}/completed', [\App\Http\Controllers\OrderController::class, 'completed']);
Route::put('/orders/{id}/canceled', [\App\Http\Controllers\OrderController::class, 'canceled']);
Route::put('/orders/{id}/active', [\App\Http\Controllers\OrderController::class, 'active']);

Route::get('/movements', [\App\Http\Controllers\ProductMovementController::class, 'index']);

Route::get('/stocks', [\App\Http\Controllers\StocksController::class, 'index']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

