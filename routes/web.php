<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');


});
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/insert', [ProductController::class, 'insert']);
Route::get('/products/update/{id}', [ProductController::class, 'update']);
Route::get('/products/delete/{id}', [ProductController::class, 'delete']);