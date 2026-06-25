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
        Schema::table('users', function (Blueprint $table) {
            // [PERUBAHAN] Menambahkan role untuk membedakan admin dan user
            $table->enum('role', ['admin', 'user'])->default('user')->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // [PERUBAHAN] Menghapus kolom role jika rollback
            $table->dropColumn('role');
        });
    }
};
