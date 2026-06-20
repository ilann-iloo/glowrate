<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // [PERUBAHAN] Relasi produk ke kategori
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();

            // [PERUBAHAN] Data utama produk
            $table->string('name');
            $table->string('brand');
            $table->unsignedInteger('price');
            $table->text('description');

            // [PERUBAHAN] Untuk menyimpan nama file gambar produk
            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
