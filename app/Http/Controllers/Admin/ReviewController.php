<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        // [PERUBAHAN] Menampilkan semua review beserta user dan produk
        $reviews = Review::with(['user', 'product'])
            ->latest()
            ->get();

        return view('admin.reviews.index', compact('reviews'));
    }

    public function toggleStatus($id)
    {
        // [PERUBAHAN] Mengubah status review Aktif menjadi Nonaktif atau sebaliknya
        $review = Review::findOrFail($id);

        $review->status = $review->status === 'Aktif'
            ? 'Nonaktif'
            : 'Aktif';

        $review->save();

        return back()->with('success', 'Status review berhasil diubah.');
    }

    public function edit($id)
    {
        // [PERUBAHAN] Menampilkan form edit review jika diperlukan admin
        $review = Review::with(['user', 'product'])->findOrFail($id);

        return view('admin.reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        // [PERUBAHAN] Validasi data review menggunakan kolom content
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string|max:1000',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        $review = Review::findOrFail($id);

        $review->update([
            'rating' => $request->rating,
            'content' => $request->content,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.reviews.index')
            ->with('success', 'Review berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // [PERUBAHAN] Menghapus review
        $review = Review::findOrFail($id);
        $review->delete();

        return back()->with('success', 'Review berhasil dihapus.');
    }
}