<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;



class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['user', 'product'])
            ->latest()
            ->get();

        return view('admin.reviews.index', compact('reviews'));
    }

    public function toggleStatus($id)
    {
        $review = Review::findOrFail($id);

        $review->status = $review->status === 'Aktif'
            ? 'Nonaktif'
            : 'Aktif';

        $review->save();

        return back()->with('success', 'Status review berhasil diubah');
    }

    public function destroy($id)
    {
        Review::findOrFail($id)->delete();

        return back()->with('success', 'Review berhasil dihapus');
    }

        public function edit($id)
    {
        $review = Review::findOrFail($id);

        return view('admin.reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
            'status' => 'required'
        ]);

        $review = Review::findOrFail($id);

        $review->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Review berhasil diupdate');
    }
}