<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string|max:1000',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'rating' => $request->rating,
            'content' => $request->content,
            'status' => 'Nonaktif',
        ]);

        return back()->with(
            'success',
            'Review berhasil dikirim dan menunggu persetujuan admin.'
        );
    }

    public function toggleStatus($id)
{
    $review = \App\Models\Review::findOrFail($id);

    if ($review->status === 'Aktif') {
        $review->status = 'Nonaktif';
    } else {
        $review->status = 'Aktif';
    }

    $review->save();

    return redirect()->back()
        ->with('success', 'Status review berhasil diubah');
}
}