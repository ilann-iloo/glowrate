<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

        // review yang sudah aktif
    public function activeReviews()
    {
        return $this->hasMany(Review::class)
            ->where('status', 'Aktif');
    }

        public function getActiveReviewsCountAttribute()
    {
        return $this->activeReviews()->count();
    }

    public function getAverageRatingAttribute()
    {
        return $this->activeReviews()->avg('rating') ?? 0;
    }
}