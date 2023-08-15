<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;

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
Route::get('/products', [\App\Http\Controllers\ProductsController::class, 'index']); 
Route::get('/products/{id}', [\App\Http\Controllers\ProductsController::class, 'show']);

Route::get('/products/categories', [\App\Http\Controllers\CategoriesController::class, 'index']);
Route::get('/products/categories/{category}', [\App\Http\Controllers\ProductsController::class, 'byCategory']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
