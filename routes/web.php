<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/products/{product}', [ProductController::class, 'show'])->name('product.show');

Route::get('/orders/create/{product}', [OrderController::class, 'create'])->name('order.create');
Route::post('/orders/create/{product}', [OrderController::class, 'store'])->name('order.store');

Route::get('/products/test/filter', [ProductController::class, 'testFilters'])->name('products.test');
Route::get('/orders/test/filter', [OrderController::class, 'testFilters'])->name('orders.test');
