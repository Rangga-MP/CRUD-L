<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import DB Facade

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Masukkan data jurusan di sini
        $jurusan = [
            ['nama_jurusan' => 'IPA'],
            ['nama_jurusan' => 'IPS'],
            ['nama_jurusan' => 'Bahasa'],
            ['nama_jurusan' => 'Teknik Komputer Jaringan'],
            ['nama_jurusan' => 'Rekayasa Perangkat Lunak'],
            // Tambahkan jurusan lain sesuai kebutuhan Anda dari data lama
        ];

        // Masukkan data ke tabel 'jurusan'
        DB::table('jurusan')->insert($jurusan);
    }
}