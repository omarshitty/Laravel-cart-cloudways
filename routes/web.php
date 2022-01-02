<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
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

Route::get('/',[PageController::class , 'index'])->name('home');

Route::get('/shop',[ProductController::class , 'index'])->name('shop');

Route::get('/shop/{id}',[ProductController::class , 'show'])->name('product');

Route::get('/cart', [CartController::class , 'cart'])->name('cart');

Route::get('/add-to-cart/{id}', [CartController::class , 'AddToCart'])->name('add.to.cart');

Route::get('/delete-from-cart/{id}', [CartController::class , 'delete'])->name('delete.from.cart');

Route::post('/update-from-cart/{id}', [CartController::class , 'updateQuantity'])->name('update.from.cart');


