<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataPendaftar; // Menggunakan Model DataPendaftar
use App\Models\User; // Menggunakan Model User
use App\Models\Wilayah; // <--- TAMBAHKAN BARIS INI
use App\Models\Jurusan; // <--- TAMBAHKAN BARIS INI

class AdminController extends Controller
{
    /**
     * Menampilkan dashboard admin.
     */
    public function index()
    {
        // Contoh data untuk dashboard admin
        $totalPendaftar = DataPendaftar::count();
        $pendaftarPending = DataPendaftar::where('status_verifikasi', 'pending')->count();
        $pendaftarTerverifikasi = DataPendaftar::where('status_verifikasi', 'terverifikasi')->count();
        $pendaftarDitolak = DataPendaftar::where('status_verifikasi', 'ditolak')->count();

        // Ambil daftar pendaftar terbaru atau yang pending
        $latestPendaftar = DataPendaftar::with(['user', 'wilayah', 'jurusan'])
                                        ->orderBy('tanggal_daftar', 'desc')
                                        ->limit(10)
                                        ->get();

        return view('admin.dashboard', compact(
            'totalPendaftar',
            'pendaftarPending',
            'pendaftarTerverifikasi',
            'pendaftarDitolak',
            'latestPendaftar'
        )); // Akan mencari resources/views/admin/dashboard.blade.php
    }

    /**
     * Menampilkan daftar semua pendaftar.
     */
    public function listPendaftar()
    {
        $allPendaftar = DataPendaftar::with(['user', 'wilayah', 'jurusan'])->orderBy('tanggal_daftar', 'desc')->get();
        return view('admin.pendaftar.list', compact('allPendaftar'));
    }

    /**
     * Menampilkan detail pendaftar.
     */
    public function showPendaftarDetail($id_pendaftar)
    {
        $pendaftar = DataPendaftar::with(['user', 'wilayah', 'jurusan'])->find($id_pendaftar);

        if (!$pendaftar) {
            abort(404); // Tampilkan halaman 404 jika pendaftar tidak ditemukan
        }

        return view('admin.pendaftar.detail', compact('pendaftar'));
    }

    /**
     * Memproses verifikasi pendaftar.
     */
    public function verifyPendaftar(Request $request, $id_pendaftar)
    {
        $pendaftar = DataPendaftar::find($id_pendaftar);

        if (!$pendaftar) {
            return back()->with('error', 'Pendaftar tidak ditemukan.');
        }

        $request->validate([
            'status' => 'required|in:terverifikasi,ditolak',
        ]);

        $pendaftar->status_verifikasi = $request->status;
        $pendaftar->save();

        return redirect()->route('admin.pendaftar.list')->with('success', 'Status verifikasi pendaftar berhasil diperbarui.');
    }

    /**
     * Menampilkan form edit pendaftar.
     */
    public function editPendaftar($id_pendaftar)
    {
        $pendaftar = DataPendaftar::with(['user', 'wilayah', 'jurusan'])->find($id_pendaftar);
        $wilayahs = Wilayah::all(); // <--- Penggunaan model Wilayah
        $jurusan = Jurusan::all(); // <--- Penggunaan model Jurusan

        if (!$pendaftar) {
            abort(404);
        }

        return view('admin.pendaftar.edit', compact('pendaftar', 'wilayahs', 'jurusan'));
    }

    /**
     * Memproses update data pendaftar.
     */
    public function updatePendaftar(Request $request, $id_pendaftar)
    {
        $pendaftar = DataPendaftar::find($id_pendaftar);

        if (!$pendaftar) {
            return back()->with('error', 'Pendaftar tidak ditemukan.');
        }

        $request->validate([
            'nisn' => 'required|string|max:20|unique:data_pendaftar,nisn,' . $id_pendaftar . ',id_pendaftar',
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'id_wilayah' => 'required|exists:wilayah,id',
            'asal_sekolah' => 'required|string|max:255',
            'nilai_rata_rata' => 'required|numeric|between:0,100.00',
            'pilihan_jurusan' => 'required|exists:jurusan,id',
        ]);

        $pendaftar->update($request->all()); // Update semua field yang ada di $fillable

        return redirect()->route('admin.pendaftar.detail', $id_pendaftar)->with('success', 'Data pendaftar berhasil diperbarui.');
    }

    /**
     * Menghapus data pendaftar.
     */
    public function deletePendaftar($id_pendaftar)
    {
        $pendaftar = DataPendaftar::find($id_pendaftar);

        if (!$pendaftar) {
            return back()->with('error', 'Pendaftar tidak ditemukan.');
        }

        $pendaftar->delete();

        return redirect()->route('admin.pendaftar.list')->with('success', 'Data pendaftar berhasil dihapus.');
    }
}
