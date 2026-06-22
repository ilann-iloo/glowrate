<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\ReviewController;

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
// Route Review User
// =======================

Route::middleware('auth')->group(function () {

    Route::post(
        '/products/{product}/review',
        [ReviewController::class, 'store']
    )->name('reviews.store');

});

// =======================
// Route Admin
// =======================

// [PERUBAHAN] Route admin hanya bisa diakses oleh user yang login dan memiliki role admin
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // [PERUBAHAN] Route dashboard admin
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // [PERUBAHAN] Route resource untuk CRUD kategori
        Route::resource('/categories', CategoryController::class);

        // [PERUBAHAN] Route resource untuk CRUD produk
        Route::resource('/products', ProductController::class);

        // [PERUBAHAN] Route resource review dibatasi karena admin hanya mengelola review
        Route::resource('/reviews', AdminReviewController::class)->only([
            'index',
            'update',
            'destroy',
        ]);
    });