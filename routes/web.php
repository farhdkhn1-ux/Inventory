<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');


});
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/insert', [ProductController::class, 'insert']);
Route::get('/products/update/{id}', [ProductController::class, 'edit']);
Route::put('/products/update/{id}', [ProductController::class, 'update']);
Route::get('/products/delete/{id}', [ProductController::class, 'delete']);
Route::get('/create-product', [ProductController::class, 'create']);