<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terkait dengan model.
     * Secara default, Eloquent akan mencari tabel 'wilayahs' (plural dari Wilayah).
     * Karena tabel Anda bernama 'wilayah' (singular), kita perlu menentukannya secara eksplisit.
     *
     * @var string
     */
    protected $table = 'wilayah';

    /**
     * Nama primary key dari tabel.
     * Secara default, Eloquent mengasumsikan primary key adalah 'id'.
     * Karena primary key Anda juga 'id', ini tidak wajib, tapi baik untuk kejelasan.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Menunjukkan apakah primary key adalah auto-incrementing.
     * Secara default true.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Tipe primary key.
     * Secara default int.
     *
     * @var string
     */
    protected $keyType = 'int';

    /**
     * Menunjukkan apakah model harus menggunakan timestamps (created_at dan updated_at).
     * Karena tabel 'wilayah' di ppdb.sql tidak memiliki kolom ini, kita set false.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Atribut yang bisa diisi secara massal (mass assignable).
     * Ini penting untuk keamanan saat menyimpan data dari form.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_wilayah',
    ];

    /**
     * Definisi relasi: Wilayah memiliki banyak DataPendaftar.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dataPendaftar()
    {
        // 'DataPendaftar' adalah nama model anak
        // 'id_wilayah' adalah foreign key di tabel data_pendaftar yang merujuk ke tabel wilayah
        // 'id' adalah primary key di tabel wilayah
        return $this->hasMany(DataPendaftar::class, 'id_wilayah', 'id');
    }
}