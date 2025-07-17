<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/products', [ProductController::class,'index']);
Route::get('/products/create', [ProductController::class,'create']);
Route::get('/products/edit/{id}', [ProductController::class,'edit']);
Route::post('/products/store', [ProductController::class,'store']);
Route::put('/products/product/{id}', [ProductController::class,'update']);
Route::delete('/products/{id}', [ProductController::class,'delete']);