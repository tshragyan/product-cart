<?php

use App\Http\Controllers\CartController;
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

Route::get('/', [ProductController::class, 'index']);
Route::post('/add-to-cart', [CartController::class, 'create'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.list');
Route::post('/order', [OrderController::class, 'create'])->name('order.create');
Route::get('/orders', [OrderController::class, 'index'])->name('order.list')->middleware('auth');
Route::delete('{order}/delete', [OrderController::class, 'delete'])->name('order.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
