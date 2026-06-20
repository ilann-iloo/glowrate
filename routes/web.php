<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

// [PERUBAHAN] Route halaman beranda
Route::get('/', [PublicController::class, 'home'])->name('home');

// [PERUBAHAN] Route halaman daftar produk dengan search, filter kategori, dan pagination
Route::get('/produk', [PublicController::class, 'products'])->name('products');

// [PERUBAHAN] Route halaman detail produk
Route::get('/produk/{id}', [PublicController::class, 'productDetail'])->name('products.detail');

// [PERUBAHAN] Route halaman produk berdasarkan kategori
Route::get('/kategori/{id}', [PublicController::class, 'category'])->name('category');

// [PERUBAHAN] Route halaman beranda
Route::get('/', [PublicController::class, 'home'])->name('home');

// [PERUBAHAN] Route halaman daftar produk
Route::get('/produk', [PublicController::class, 'products'])->name('products');

// [PERUBAHAN] Route halaman detail produk
Route::get('/produk/{id}', [PublicController::class, 'productDetail'])->name('products.detail');

// [PERUBAHAN] Route halaman daftar kategori
Route::get('/kategori', [PublicController::class, 'categories'])->name('categories');

// [PERUBAHAN] Route halaman produk berdasarkan kategori
Route::get('/kategori/{id}', [PublicController::class, 'category'])->name('category');

// [PERUBAHAN] Route halaman tentang
Route::get('/tentang', [PublicController::class, 'about'])->name('about');