<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Untuk mendapatkan user yang sedang login
use App\Models\DataPendaftar; // Menggunakan Model DataPendaftar
use App\Models\Wilayah; // Menggunakan Model Wilayah
use App\Models\Jurusan; // Menggunakan Model Jurusan

class UserController extends Controller
{
    /**
     * Menampilkan dashboard pengguna.
     * Menggantikan logika dari user/index.php.
     */
    public function index()
    {
        // Mengambil data pendaftar yang terkait dengan user yang sedang login
        $pendaftar = Auth::user()->dataPendaftar; // Menggunakan relasi hasOne dari model User

        return view('user.dashboard', compact('pendaftar')); // Akan mencari resources/views/user/dashboard.blade.php
    }

    /**
     * Menampilkan form pendaftaran data.
     * Menggantikan logika dari user/daftar.php (GET).
     */
    public function showDaftarForm()
    {
        // Ambil data wilayah dan jurusan untuk dropdown
        $wilayahs = Wilayah::all();
        $jurusan = Jurusan::all();

        return view('user.daftar', compact('wilayahs', 'jurusan')); // Akan mencari resources/views/user/daftar.blade.php
    }

    /**
     * Memproses submit form pendaftaran data.
     * Menggantikan logika dari user/submit.php (POST).
     */
    public function submitDaftar(Request $request)
    {
        // Validasi input
        $request->validate([
            'nisn' => 'required|string|max:20|unique:data_pendaftar,nisn',
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'id_wilayah' => 'required|exists:wilayah,id', // Pastikan ID wilayah ada di tabel wilayah
            'asal_sekolah' => 'required|string|max:255',
            'nilai_rata_rata' => 'required|numeric|between:0,100.00',
            'pilihan_jurusan' => 'required|exists:jurusan,id', // Pastikan ID jurusan ada di tabel jurusan
        ]);

        // Buat entri data pendaftar baru
        DataPendaftar::create([
            'nisn' => $request->nisn,
            'nama_lengkap' => $request->nama_lengkap,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'id_wilayah' => $request->id_wilayah,
            'asal_sekolah' => $request->asal_sekolah,
            'nilai_rata_rata' => $request->nilai_rata_rata,
            'pilihan_jurusan' => $request->pilihan_jurusan,
            'user_id' => Auth::id(), // Otomatis mengisi user_id dari user yang sedang login
            'status_verifikasi' => 'pending', // Default status
            // tanggal_daftar akan otomatis terisi karena useCurrent() di migrasi
        ]);

        return redirect()->route('user.mydata')->with('success', 'Data pendaftaran berhasil disimpan! Menunggu verifikasi.');
    }

    /**
     * Menampilkan data pendaftar milik user yang sedang login.
     * Menggantikan logika dari user/mydata.php.
     */
    public function myData()
    {
        // Ambil data pendaftar yang terkait dengan user yang sedang login
        $pendaftar = Auth::user()->dataPendaftar()
                            ->with(['wilayah', 'jurusan']) // Eager load relasi untuk menghindari N+1 query
                            ->first();

        return view('user.mydata', compact('pendaftar')); // Akan mencari resources/views/user/mydata.blade.php
    }

    /**
     * Menampilkan laporan (jika ada).
     * Menggantikan logika dari user/report.php.
     */
    public function report()
    {
        // Logika untuk menampilkan laporan.
        // Mungkin mengambil data pendaftar dengan status tertentu, dll.
        $pendaftar = Auth::user()->dataPendaftar;

        return view('user.report', compact('pendaftar')); // Akan mencari resources/views/user/report.blade.php
    }

    /**
     * Menampilkan halaman status verifikasi.
     * Menggantikan logika dari user/verified.php.
     */
    public function verified()
    {
        // Logika untuk menampilkan status verifikasi pendaftar.
        $pendaftar = Auth::user()->dataPendaftar;

        return view('user.verified', compact('pendaftar')); // Akan mencari resources/views/user/verified.blade.php
    }
}