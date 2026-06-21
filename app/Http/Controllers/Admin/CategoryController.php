<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // [PERUBAHAN] Menampilkan semua data kategori
        $categories = Category::latest()->get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // [PERUBAHAN] Menampilkan form tambah kategori
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // [PERUBAHAN] Logic tambah kategori akan dibuat pada tahap CRUD
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
        // [PERUBAHAN] Form edit kategori akan dibuat pada tahap CRUD
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // [PERUBAHAN] Logic update kategori akan dibuat pada tahap CRUD
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // [PERUBAHAN] Logic hapus kategori akan dibuat pada tahap CRUD
    }
}
