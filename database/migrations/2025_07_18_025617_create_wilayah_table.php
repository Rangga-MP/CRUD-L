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
        Schema::create('wilayah', function (Blueprint $table) {
            $table->increments('id'); // Menggunakan increments untuk int(11) AUTO_INCREMENT
            $table->string('nama_wilayah'); // varchar(255) NOT NULL
            // Jika Anda ingin Laravel otomatis mengelola kolom created_at dan updated_at,
            // Anda bisa menambahkan $table->timestamps();
            // Namun, jika di DB asli Anda tidak ada, tidak perlu ditambahkan.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wilayah');
    }
};