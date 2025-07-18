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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id'); // int(11) NOT NULL AUTO_INCREMENT
            $table->string('username')->unique(); // varchar(255) NOT NULL, UNIQUE KEY `username`
            $table->string('password'); // varchar(255) NOT NULL
            $table->string('email')->unique(); // varchar(255) NOT NULL, UNIQUE KEY `email`
            // $table->timestamp('email_verified_at')->nullable(); // Tidak ada di ppdb.sql, bisa dihapus
            // $table->rememberToken(); // Tidak ada di ppdb.sql, bisa dihapus
            // $table->timestamps(); // Jika ingin created_at dan updated_at, biarkan atau tambahkan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};