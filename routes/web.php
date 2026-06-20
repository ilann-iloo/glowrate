<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

// [PERUBAHAN] Halaman beranda
Route::get('/', [PublicController::class, 'home'])->name('home');

// [PERUBAHAN] Halaman daftar produk dengan search, pagination, dan filter kategori
Route::get('/produk', [PublicController::class, 'products'])->name('products');

// [PERUBAHAN] Halaman daftar kategori
Route::get('/kategori', [PublicController::class, 'categories'])->name('categories');

// [PERUBAHAN] Halaman produk berdasarkan kategori
Route::get('/kategori/{id}', [PublicController::class, 'category'])->name('category');

// [PERUBAHAN] Halaman detail produk
Route::get('/produk/{id}', [PublicController::class, 'productDetail'])->name('products.detail');

// [PERUBAHAN] Halaman tentang
Route::get('/tentang', [PublicController::class, 'about'])->name('about');