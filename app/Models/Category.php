<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function products()
    {
        // [PERUBAHAN] Satu kategori memiliki banyak produk
        return $this->hasMany(Product::class);
    }
}
