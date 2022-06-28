<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ShopController;
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

Route::get('/', \App\Http\Controllers\WelcomeController::class)->name('welcome');
Route::get('shop/product/{product:slug}',\App\Http\Controllers\ProductShowController::class)->name('product-show');
Route::get('shop/category/{category:slug}',\App\Http\Controllers\CategoryShowController::class)->name('category-show');

Route::get('/shop/bag',\App\Http\Controllers\ShoppingCartController::class)->name('cart');
Route::get('/shop/checkout',\App\Http\Controllers\CheckoutController::class)->middleware('auth')->name('shop.checkout');
Route::get('/orders',\App\Http\Controllers\OrderController::class)->name('orders');
Route::get('/orders/{order:uuid}/confirmation',\App\Http\Controllers\OrderConfirmationController::class)->name('orders.conformation');
Route::get('/shop',ShopController::class)->name('shop');
Route::get('/contact-us',ContactUsController::class)->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
