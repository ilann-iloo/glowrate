<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
        ['email' => 'admin@glowrate.test'],
            [
                'name' => 'Admin GlowRate',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
        ['email' => 'user@glowrate.test'],
            [
                'name' => 'User GlowRate',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ]
        );

        // [PERUBAHAN] Seeder akun admin/user
        $this->call([
            UserSeeder::class,
            CategoryProductSeeder::class,
        ]);
    }
}
