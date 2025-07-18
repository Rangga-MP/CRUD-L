<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import DB Facade

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Masukkan data wilayah di sini
        $wilayahs = [
            ['nama_wilayah' => 'DKI Jakarta'],
            ['nama_wilayah' => 'Jawa Barat'],
            ['nama_wilayah' => 'Jawa Tengah'],
            ['nama_wilayah' => 'Jawa Timur'],
            ['nama_wilayah' => 'Sumatera Utara'],
            ['nama_wilayah' => 'Sumatera Selatan'],
            ['nama_wilayah' => 'Sulawesi Selatan'],
            ['nama_wilayah' => 'Bali'],
            // Tambahkan wilayah lain sesuai kebutuhan Anda dari data lama
        ];

        // Masukkan data ke tabel 'wilayah'
        DB::table('wilayah')->insert($wilayahs);
    }
}