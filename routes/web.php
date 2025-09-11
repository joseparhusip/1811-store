<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController; // [PENAMBAHAN] Import AuthController
use App\Http\Controllers\UserController; // [PENAMBAHAN] Import UserController

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda mendaftarkan rute web untuk aplikasi Anda. Rute-rute ini
| dimuat oleh RouteServiceProvider dalam sebuah grup yang berisi
| middleware group "web".
|
*/

// == RUTE HALAMAN UTAMA ==
Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/about', function () {
    return view('users.pages.about');
})->name('about');
Route::get('/contact', function () {
    return view('users.pages.contact');
})->name('contact');

// == RUTE PRODUK ==
Route::get('/product/{product_id}', [ProductController::class, 'show'])->name('product.show');

// == RUTE KERANJANG BELANJA (CART) ==
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{rowId}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{rowId}', [CartController::class, 'remove'])->name('cart.remove');

// == [PENAMBAHAN] RUTE UNTUK AUTENTIKASI ==

// Middleware 'guest' memastikan halaman ini hanya bisa diakses oleh pengguna yang BELUM login.
Route::middleware('guest')->group(function () {
    // Menampilkan form signup
    Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.form');
    // Memproses data dari form signup
    Route::post('/signup', [AuthController::class, 'signup'])->name('signup.submit');
    
    // Menampilkan form login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    // Memproses data dari form login
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

// Middleware 'auth' memastikan rute ini hanya bisa diakses oleh pengguna yang SUDAH login.
Route::middleware('auth')->group(function () {
    // Rute untuk halaman profil (edit profile)
    // Pastikan Anda membuat UserController dengan method 'profile'
    Route::get('/profile', [UserController::class, 'profile'])->name('profile'); 
    
    // Rute untuk logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/test', function () {
    return 'Laravel is working on Railway!';
});
// Anda mungkin perlu membuat UserController jika belum ada.
// Gunakan perintah: php artisan make:controller UserController
// Lalu tambahkan method profile() di dalamnya.