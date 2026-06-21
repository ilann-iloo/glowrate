<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // [PERUBAHAN] Menghitung jumlah user biasa
        $totalUsers = User::where('role', 'user')->count();

        // [PERUBAHAN] Menghitung jumlah kategori
        $totalCategories = Category::count();

        // [PERUBAHAN] Menghitung jumlah produk
        $totalProducts = Product::count();

        // [PERUBAHAN] Menghitung jumlah seluruh review
        $totalReviews = Review::count();

        // [PERUBAHAN] Menghitung review aktif
        $activeReviews = Review::where('status', 'Aktif')->count();

        // [PERUBAHAN] Menghitung review nonaktif yang perlu dimoderasi
        $pendingReviews = Review::where('status', 'Nonaktif')->count();

        // [PERUBAHAN] Mengambil 5 review terbaru
        $latestReviews = Review::with(['user', 'product'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalCategories',
            'totalProducts',
            'totalReviews',
            'activeReviews',
            'pendingReviews',
            'latestReviews'
        ));
    }
}