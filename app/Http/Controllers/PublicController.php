<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        // [PERUBAHAN] Mengambil 6 produk terbaru untuk ditampilkan di beranda
        $latestProducts = Product::with('category')
            ->latest()
            ->take(6)
            ->get();

        // [PERUBAHAN] Mengambil kategori beserta jumlah produknya
        $categories = Category::withCount('products')
            ->latest()
            ->take(4)
            ->get();

        return view('public.home', compact('latestProducts', 'categories'));
    }

    public function products(Request $request)
    {
        // [PERUBAHAN] Mengambil keyword pencarian dari input user
        $search = trim($request->get('search'));

        // [PERUBAHAN] Mengambil kategori yang dipilih user
        $categoryId = $request->get('category');

        // [PERUBAHAN] Query produk dibuat fleksibel agar bisa search, filter, dan pagination
        $products = Product::with('category')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('brand', 'like', '%' . $search . '%');
                });
            })
            ->when($categoryId, function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->latest()
            ->paginate(8)
            ->withQueryString();

        // [PERUBAHAN] Mengambil semua kategori untuk dropdown filter
        $categories = Category::orderBy('name', 'asc')->get();

        return view('public.products', compact(
            'products',
            'categories',
            'search',
            'categoryId'
        ));
    }

    public function productDetail($id)
    {
        // [PERUBAHAN] Menampilkan detail produk, kategori, dan review aktif
        $product = Product::with([
            'category',
            'activeReviews' => function ($query) {
                $query->latest()->with('user');
            }
        ])
            // [PERUBAHAN] Menghitung jumlah review aktif
            ->withCount('activeReviews')

            // [PERUBAHAN] Menghitung rata-rata rating dari review aktif
            ->withAvg(['activeReviews as average_rating'], 'rating')

            ->findOrFail($id);

        return view('public.product-detail', compact('product'));
    }

    public function category($id)
    {
        // [PERUBAHAN] Mengambil kategori berdasarkan ID
        $category = Category::findOrFail($id);

        // [PERUBAHAN] Menampilkan produk berdasarkan kategori tertentu
        $products = Product::with('category')
            ->where('category_id', $id)
            ->latest()
            ->paginate(8);

        return view('public.category', compact('category', 'products'));
    }

    public function categories()
    {
        // [PERUBAHAN] Menampilkan semua kategori beserta jumlah produknya
        $categories = Category::withCount('products')
            ->latest()
            ->get();

        return view('public.categories', compact('categories'));
    }

    public function about()
    {
        // [PERUBAHAN] Menampilkan halaman tentang website
        return view('public.about');
    }
}