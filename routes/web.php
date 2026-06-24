<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\UserController;

// =======================
// PUBLIC ROUTES
// =======================

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/produk', [PublicController::class, 'products'])->name('products');

Route::get('/kategori', [PublicController::class, 'categories'])->name('categories');

Route::get('/kategori/{id}', [PublicController::class, 'category'])->name('category');

Route::get('/produk/{id}', [PublicController::class, 'productDetail'])->name('products.detail');

Route::get('/tentang', [PublicController::class, 'about'])->name('about');


// =======================
// AUTH ROUTES
// =======================

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('forgot.password');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// =======================
// USER REVIEW ROUTE
// =======================

Route::middleware('auth')->group(function () {
    Route::post('/products/{product}/review', [ReviewController::class, 'store'])
        ->name('reviews.store');
});


// =======================
// ADMIN ROUTES
// =======================

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // [PERUBAHAN] Dashboard admin
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // [PERUBAHAN] CRUD kategori tanpa halaman show
        Route::resource('/categories', CategoryController::class)
            ->except(['show']);

        // [PERUBAHAN] CRUD produk tanpa halaman show
        Route::resource('/products', ProductController::class)
            ->except(['show']);

        // [PERUBAHAN] Kelola review admin
        Route::get('/reviews', [AdminReviewController::class, 'index'])
            ->name('reviews.index');

        Route::get('/reviews/toggle/{id}', [AdminReviewController::class, 'toggleStatus'])
            ->name('reviews.toggle');

        Route::get('/reviews/{id}/edit', [AdminReviewController::class, 'edit'])
            ->name('reviews.edit');

        Route::put('/reviews/{id}', [AdminReviewController::class, 'update'])
            ->name('reviews.update');

        Route::delete('/reviews/{id}', [AdminReviewController::class, 'destroy'])
            ->name('reviews.destroy');

        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');

        Route::delete('/users/{id}', [UserController::class, 'destroy'])
            ->name('users.destroy');
    });