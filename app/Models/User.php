<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail; // Tidak diperlukan jika tidak ada verifikasi email
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Bisa dihapus jika tidak menggunakan Laravel Sanctum untuk API

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Nama primary key dari tabel.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Menunjukkan apakah model harus menggunakan timestamps.
     * Karena tabel 'users' di ppdb.sql tidak memiliki created_at/updated_at, kita set false.
     * Jika Anda ingin menambahkannya, ubah ke true dan tambahkan kolom di migrasi.
     *
     * @var bool
     */
    public $timestamps = false; // Diubah menjadi false

    /**
     * Atribut yang bisa diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'email',
    ];

    /**
     * Atribut yang harus disembunyikan untuk serialisasi.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        // 'remember_token', // Dihapus karena tidak ada di tabel Anda
    ];

    /**
     * Atribut yang harus di-cast ke tipe data tertentu.
     *
     * @var array<string, string>
     */
protected $casts = [
    // 'email_verified_at' => 'datetime',
];

    /**
     * Definisi relasi: User memiliki satu DataPendaftar.
     * Asumsi: Setiap user (pendaftar) hanya bisa memiliki satu data pendaftaran.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function dataPendaftar()
    {
        // 'DataPendaftar' adalah nama model anak
        // 'user_id' adalah foreign key di tabel data_pendaftar yang merujuk ke tabel users
        // 'id' adalah primary key di tabel users
        return $this->hasOne(DataPendaftar::class, 'user_id', 'id');
    }
}