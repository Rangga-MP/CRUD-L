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
        Schema::create('data_pendaftar', function (Blueprint $table) {
            $table->increments('id_pendaftar'); // int(11) NOT NULL AUTO_INCREMENT
            $table->string('nisn', 20)->unique(); // varchar(20) NOT NULL UNIQUE
            $table->string('nama_lengkap'); // varchar(255) NOT NULL
            $table->string('tempat_lahir', 100); // varchar(100) NOT NULL
            $table->date('tanggal_lahir'); // date NOT NULL
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']); // enum('Laki-laki','Perempuan') NOT NULL
            $table->text('alamat'); // text NOT NULL
            $table->unsignedInteger('id_wilayah'); // int(11) NOT NULL, untuk foreign key
            $table->string('asal_sekolah'); // varchar(255) NOT NULL
            $table->decimal('nilai_rata_rata', 4, 2); // decimal(4,2) NOT NULL
            $table->unsignedInteger('pilihan_jurusan'); // int(11) NOT NULL, untuk foreign key
            $table->enum('status_verifikasi', ['pending', 'terverifikasi', 'ditolak'])->default('pending'); // enum dengan default 'pending'
            $table->dateTime('tanggal_daftar')->useCurrent(); // datetime NOT NULL DEFAULT current_timestamp()
            $table->unsignedInteger('user_id'); // int(11) NOT NULL, untuk foreign key

            // Definisi Foreign Keys
            $table->foreign('id_wilayah')->references('id')->on('wilayah')->onDelete('restrict');
            $table->foreign('pilihan_jurusan')->references('id')->on('jurusan')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pendaftar');
    }
};