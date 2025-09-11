<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes - Phase 1: No Database Controllers
|--------------------------------------------------------------------------
|
| Routes yang tidak memerlukan database - aman untuk deploy
|
*/

// == RUTE HALAMAN UTAMA ==
Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/shop', [ProductController::class, 'index'])->name('shop');

// Static pages tanpa controller
Route::get('/about', function () {
    return view('users.pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('users.pages.contact');
})->name('contact');

// == RUTE PRODUK ==
Route::get('/product/{product_id}', [ProductController::class, 'show'])->name('product.show');

// == RUTE KERANJANG BELANJA (CART) - Pakai Session ==
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{rowId}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{rowId}', [CartController::class, 'remove'])->name('cart.remove');

// Testing route
Route::get('/test', function () {
    return 'Laravel is working on Railway! 🚀';
});

// == TEMPORARY AUTH ROUTES (Without Database) ==
Route::get('/login', function () {
    return 'Login page - Coming soon! (Need database)';
})->name('login');

Route::get('/signup', function () {
    return 'Signup page - Coming soon! (Need database)';
})->name('signup.form');

// Logout redirect ke home
Route::post('/logout', function () {
    return redirect('/');
})->name('logout');

/*
// == PHASE 2: AUTH ROUTES (Uncomment setelah setup database) ==
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::middleware('guest')->group(function () {
    Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.form');
    Route::post('/signup', [AuthController::class, 'signup'])->name('signup.submit');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile'); 
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
*/