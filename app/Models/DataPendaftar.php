<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPendaftar extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'data_pendaftar';

    /**
     * Nama primary key dari tabel.
     * Perhatikan, primary key Anda adalah 'id_pendaftar'.
     *
     * @var string
     */
    protected $primaryKey = 'id_pendaftar';

    /**
     * Menunjukkan apakah primary key adalah auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Tipe primary key.
     *
     * @var string
     */
    protected $keyType = 'int';

    /**
     * Menunjukkan apakah model harus menggunakan timestamps.
     * Tabel Anda memiliki `tanggal_daftar` tapi tidak `updated_at`.
     * Jika Anda ingin Laravel mengelola `created_at` dan `updated_at` secara otomatis,
     * Anda bisa set `timestamps = true` dan tambahkan kolom `updated_at` di migrasi.
     * Untuk saat ini, kita set false agar sesuai dengan skema asli.
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
        'nisn',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'id_wilayah',
        'asal_sekolah',
        'nilai_rata_rata',
        'pilihan_jurusan',
        'status_verifikasi',
        'tanggal_daftar', // Meskipun default di DB, tetap bisa diisi manual
        'user_id',
    ];

    /**
     * Atribut yang harus di-cast ke tipe data tertentu.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_daftar' => 'datetime',
        'nilai_rata_rata' => 'decimal:2', // Cast sebagai decimal dengan 2 angka di belakang koma
        'jenis_kelamin' => 'string', // Enum akan di-handle sebagai string
        'status_verifikasi' => 'string', // Enum akan di-handle sebagai string
    ];

    /**
     * Definisi relasi: DataPendaftar dimiliki oleh satu User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        // 'User' adalah nama model induk
        // 'user_id' adalah foreign key di tabel data_pendaftar
        // 'id' adalah primary key di tabel users
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Definisi relasi: DataPendaftar dimiliki oleh satu Wilayah.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wilayah()
    {
        // 'Wilayah' adalah nama model induk
        // 'id_wilayah' adalah foreign key di tabel data_pendaftar
        // 'id' adalah primary key di tabel wilayah
        return $this->belongsTo(Wilayah::class, 'id_wilayah', 'id');
    }

    /**
     * Definisi relasi: DataPendaftar dimiliki oleh satu Jurusan.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jurusan()
    {
        // 'Jurusan' adalah nama model induk
        // 'pilihan_jurusan' adalah foreign key di tabel data_pendaftar
        // 'id' adalah primary key di tabel jurusan
        return $this->belongsTo(Jurusan::class, 'pilihan_jurusan', 'id');
    }
}