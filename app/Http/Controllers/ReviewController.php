<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        // Cegah admin memberikan review
        if (Auth::user()->role !== 'user') {
            return redirect()
                ->route('products.detail', $product->id)
                ->with('error', 'Admin tidak dapat memberikan review.');
        }

        // Validasi input review
        $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'content' => ['required', 'string', 'max:1000'],
        ]);

        // Simpan review
        Review::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'rating' => $request->rating,
            'content' => $request->content,
            'status' => 'Aktif',
        ]);

        return redirect()
            ->route('products.detail', $product->id)
            ->with('success', 'Review berhasil dikirim.');
    }
}