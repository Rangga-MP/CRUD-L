<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'jurusan';

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
        'nama_jurusan',
    ];

    /**
     * Definisi relasi: Jurusan memiliki banyak DataPendaftar.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dataPendaftar()
    {
        // 'DataPendaftar' adalah nama model anak
        // 'pilihan_jurusan' adalah foreign key di tabel data_pendaftar yang merujuk ke tabel jurusan
        // 'id' adalah primary key di tabel jurusan
        return $this->hasMany(DataPendaftar::class, 'pilihan_jurusan', 'id');
    }
}