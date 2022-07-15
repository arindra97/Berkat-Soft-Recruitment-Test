<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', function () {
    return view('product');
})->middleware(['auth'])->name('product');

Route::get('/customer', function () {
    return view('customer');
})->middleware(['auth'])->name('customer');

Route::get('/sales_order', function () {
    return view('sales-order');
})->middleware(['auth'])->name('sales_order');

require __DIR__.'/auth.php';
