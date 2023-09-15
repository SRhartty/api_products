<?php

use App\Http\Controllers\Api\tokenControler;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;
use App\Models\product;
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


Route::post('/users', [UserController::class, 'store']);
Route::post('/token', [TokenControler::class, 'token']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::delete('users/{id}', [UserController::class, 'delete']);
    Route::put('users/{id}', [UserController::class, 'update']);
    Route::get('users/{id}', [UserController::class, 'show']);
    Route::get('/users', [UserController::class, 'index']);

    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
});
