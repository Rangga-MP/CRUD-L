<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder lain di sini
        $this->call([
            WilayahSeeder::class,
            JurusanSeeder::class,
            // Tambahkan seeder lain di sini jika ada
        ]);

        // Contoh: Membuat user admin awal (opsional, bisa juga dibuat seeder terpisah)
        // \App\Models\User::factory()->create([
        //     'username' => 'testuser',
        //     'email' => 'test@example.com',
        //     'password' => \Illuminate\Support\Facades\Hash::make('password'),
        // ]);
    }
}