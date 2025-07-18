<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; // Penting untuk autentikasi admin

// Jika Anda ingin Admin bisa login menggunakan sistem autentikasi Laravel,
// model ini harus meng-extend Illuminate\Foundation\Auth\User
// dan bukan hanya Illuminate\Database\Eloquent\Model.
// Ini akan memungkinkan penggunaan fitur autentikasi Laravel seperti Guard.
class Admin extends Authenticatable
{
    use HasFactory;

    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'admin';

    /**
     * Nama primary key dari tabel.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Menunjukkan apakah model harus menggunakan timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Atribut yang bisa diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
    ];

    /**
     * Atribut yang harus disembunyikan untuk serialisasi.
     * Ini penting untuk menyembunyikan password saat data model diubah ke array/JSON.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];
}