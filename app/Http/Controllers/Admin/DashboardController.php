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
    //
    public function index()
    {
        // [PERUBAHAN] Menghitung data untuk ringkasan dashboard admin
        $totalUsers = User::where('role', 'user')->count();
        $totalCategories = Category::count();
        $totalProducts = Product::count();
        $totalReviews = Review::count();
        $pendingReviews = Review::where('status', 'Nonaktif')->count();
        $activeReviews = Review::where('status', 'Aktif')->count();

        // [PERUBAHAN] Mengambil review terbaru untuk ditampilkan di dashboard
        $latestReviews = Review::with(['user', 'product'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalCategories',
            'totalProducts',
            'totalReviews',
            'pendingReviews',
            'activeReviews',
            'latestReviews'
        ));
    }
}
