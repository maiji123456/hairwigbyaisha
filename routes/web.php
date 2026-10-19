<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/robots.txt', [SeoController::class, 'robots'])->name('robots');
Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])->name('sitemap');


/*
|--------------------------------------------------------------------------
| Shop / Cart / Checkout
|--------------------------------------------------------------------------
*/

Route::get('/product/{productId}', [ShopController::class, 'product'])
    ->name('shop.product');

Route::get('/cart', [ShopController::class, 'cart'])
    ->name('shop.cart');

Route::post('/cart/add', [ShopController::class, 'addToCart'])
    ->name('shop.cart.add');

Route::post('/cart/update/{cartKey}', [ShopController::class, 'updateCart'])
    ->name('shop.cart.update');

Route::post('/cart/remove/{cartKey}', [ShopController::class, 'removeFromCart'])
    ->name('shop.cart.remove');

Route::post('/cart/clear', [ShopController::class, 'clearCart'])
    ->name('shop.cart.clear');


Route::get('/checkout', [ShopController::class, 'checkout'])
    ->name('shop.checkout');

Route::post('/checkout', [ShopController::class, 'placeOrder'])
    ->name('shop.checkout.place');


Route::get('/order-confirmation', [ShopController::class, 'confirmation'])
    ->name('shop.confirmation');
