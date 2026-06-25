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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            // [PERUBAHAN] Relasi review ke user
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            // [PERUBAHAN] Relasi review ke produk
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();

            // [PERUBAHAN] Rating produk dari 1 sampai 5
            $table->unsignedTinyInteger('rating');

            // [PERUBAHAN] Isi review produk
            $table->text('content');

            // [PERUBAHAN] Review tidak langsung tampil sebelum disetujui admin
            $table->enum('status', ['Aktif', 'Nonaktif'])->default('Nonaktif');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
