<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // [PERUBAHAN] Membuat kategori awal untuk testing halaman publik
        $skincare = Category::firstOrCreate(
            ['name' => 'Skincare'],
            ['description' => 'Produk perawatan kulit wajah seperti sunscreen, moisturizer, dan serum.']
        );

        $kosmetik = Category::firstOrCreate(
            ['name' => 'Kosmetik'],
            ['description' => 'Produk kecantikan seperti lip cream, foundation, dan bedak.']
        );

        $bodyCare = Category::firstOrCreate(
            ['name' => 'Body Care'],
            ['description' => 'Produk perawatan tubuh seperti body lotion dan body scrub.']
        );

        // [PERUBAHAN] Membuat produk awal agar halaman publik tidak kosong
        Product::firstOrCreate(
            ['name' => 'Lightening Day Cream'],
            [
                'category_id' => $skincare->id,
                'brand' => 'Wardah',
                'price' => 35000,
                'description' => 'Krim pagi dengan tekstur ringan untuk membantu menjaga kelembapan kulit.',
                'image' => null,
            ]
        );

        Product::firstOrCreate(
            ['name' => 'UV Moisture Gel'],
            [
                'category_id' => $skincare->id,
                'brand' => 'Emina',
                'price' => 28000,
                'description' => 'Produk sunscreen dengan tekstur gel yang ringan digunakan sehari-hari.',
                'image' => null,
            ]
        );

        Product::firstOrCreate(
            ['name' => 'Lip Cream Matte'],
            [
                'category_id' => $kosmetik->id,
                'brand' => 'Make Over',
                'price' => 89000,
                'description' => 'Lip cream dengan hasil akhir matte dan warna yang tahan lama.',
                'image' => null,
            ]
        );

        Product::firstOrCreate(
            ['name' => 'Brightening Body Lotion'],
            [
                'category_id' => $bodyCare->id,
                'brand' => 'Scarlett',
                'price' => 75000,
                'description' => 'Body lotion untuk membantu menjaga kelembapan dan tampilan kulit tubuh.',
                'image' => null,
            ]
        );
    }
}
