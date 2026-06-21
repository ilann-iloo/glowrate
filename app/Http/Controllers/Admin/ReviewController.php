<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // [PERUBAHAN] Menampilkan semua review beserta user dan produk
        $reviews = Review::with(['user', 'product'])
            ->latest()
            ->get();

        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // [PERUBAHAN] Admin tidak menambahkan review dari halaman ini
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // [PERUBAHAN] Review dibuat oleh user, bukan admin
        abort(404);
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
        // [PERUBAHAN] Tidak digunakan karena admin hanya mengubah status review
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // [PERUBAHAN] Logic update status review akan dibuat pada tahap moderasi review
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // [PERUBAHAN] Logic hapus review akan dibuat pada tahap CRUD review
    }
}
