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
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id'); // Menggunakan increments untuk int(11) AUTO_INCREMENT
            $table->string('username')->unique(); // varchar(255) NOT NULL UNIQUE
            $table->string('password'); // varchar(255) NOT NULL
            // Jika ingin timestamps, bisa ditambahkan $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};