<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;

// =======================
// Route Halaman Publik
// =======================

// [PERUBAHAN] Halaman beranda
Route::get('/', [PublicController::class, 'home'])->name('home');

// [PERUBAHAN] Halaman daftar produk
Route::get('/produk', [PublicController::class, 'products'])->name('products');

// [PERUBAHAN] Halaman daftar kategori
Route::get('/kategori', [PublicController::class, 'categories'])->name('categories');

// [PERUBAHAN] Halaman produk berdasarkan kategori
Route::get('/kategori/{id}', [PublicController::class, 'category'])->name('category');

// [PERUBAHAN] Halaman detail produk
Route::get('/produk/{id}', [PublicController::class, 'productDetail'])->name('products.detail');

// [PERUBAHAN] Halaman tentang
Route::get('/tentang', [PublicController::class, 'about'])->name('about');


// =======================
// Route Auth
// =======================

// [PERUBAHAN] Route login dan register hanya untuk pengunjung yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
});

// [PERUBAHAN] Route logout hanya untuk user/admin yang sudah login
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// =======================
// Route Admin
// =======================

// [PERUBAHAN] Route admin hanya bisa diakses setelah login dan role admin
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });