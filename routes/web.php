<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;

// =======================
// Route Halaman Publik
// =======================

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/produk', [PublicController::class, 'products'])->name('products');

Route::get('/kategori', [PublicController::class, 'categories'])->name('categories');

Route::get('/kategori/{id}', [PublicController::class, 'category'])->name('category');

Route::get('/produk/{id}', [PublicController::class, 'productDetail'])->name('products.detail');

Route::get('/tentang', [PublicController::class, 'about'])->name('about');


// =======================
// Route Auth
// =======================

// [PERUBAHAN] Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// [PERUBAHAN] Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

// [PERUBAHAN] Logout hanya bisa dilakukan user yang sudah login
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// =======================
// Route Admin
// =======================

// [PERUBAHAN] Dashboard admin hanya bisa diakses admin
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });