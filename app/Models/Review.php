<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'content',
        'status',
    ];

    public function user()
    {
        // [PERUBAHAN] Review dibuat oleh satu user
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        // [PERUBAHAN] Review dimiliki oleh satu produk
        return $this->belongsTo(Product::class);
    }
}
