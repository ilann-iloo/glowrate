<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'brand',
        'price',
        'description',
        'image',
    ];

    public function category()
    {
        // [PERUBAHAN] Satu produk dimiliki oleh satu kategori
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        // [PERUBAHAN] Satu produk memiliki banyak review
        return $this->hasMany(Review::class);
    }

    public function activeReviews()
    {
        // [PERUBAHAN] Hanya menampilkan review yang sudah aktif
        return $this->hasMany(Review::class)->where('status', 'Aktif');
    }
}
