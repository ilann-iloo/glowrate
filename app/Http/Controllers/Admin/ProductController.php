<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // [PERUBAHAN] Menampilkan semua data produk beserta kategori
        $products = Product::with('category')
            ->latest()
            ->get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // [PERUBAHAN] Mengambil data kategori untuk dropdown form produk
        $categories = Category::orderBy('name', 'asc')->get();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // [PERUBAHAN] Logic tambah produk dan upload gambar akan dibuat pada tahap CRUD
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // [PERUBAHAN] Tidak digunakan pada project ini
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // [PERUBAHAN] Form edit produk akan dibuat pada tahap CRUD
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // [PERUBAHAN] logic update produk akan dibuat pada tahap CRUD
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // [PERUBAHAN] Logic hapus produk akan dibuat pada tahap CRUD
    }
}
