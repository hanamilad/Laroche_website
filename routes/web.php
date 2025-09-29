<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;

// الصفحة الرئيسية
Route::view('/', 'home')->name('home');

// روابط وهمية للـ Navbar
Route::view('/contact', 'welcome')->name('contact');
Route::view('/our-story', 'welcome')->name('our-story');
Route::view('/categories', 'welcome')->name('categories');
Route::view('/wishlist', 'welcome')->name('wishlist');
Route::view('/compare', 'welcome')->name('compare');
Route::view('/products', 'welcome')->name('products');
Route::view('/orders', 'welcome')->name('orders');

// Dashboard
Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

// Profile
Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

// Checkout
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::view('cart', 'cart')->name('cart');

    Route::get('/products/{slug}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/category/{slug}', [ProductController::class, 'category'])->name('products.category');


});

// تصفح المنتجات حسب التصنيف
Route::get('/category/{slug}', [ProductController::class, 'category'])->name('products.category');

require __DIR__ . '/auth.php';
