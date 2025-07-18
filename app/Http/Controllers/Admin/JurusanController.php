<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurusan; // Import Model Jurusan

class JurusanController extends Controller
{
    /**
     * Menampilkan daftar semua jurusan.
     */
    public function index()
    {
        $jurusan = Jurusan::orderBy('nama_jurusan')->get();
        return view('admin.jurusan.index', compact('jurusan'));
    }

    /**
     * Menampilkan form untuk membuat jurusan baru.
     */
    public function create()
    {
        return view('admin.jurusan.create');
    }

    /**
     * Menyimpan jurusan baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required|string|max:255|unique:jurusan,nama_jurusan',
        ]);

        Jurusan::create($request->all());

        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit jurusan.
     */
    public function edit(Jurusan $jurusan) // Menggunakan Route Model Binding
    {
        return view('admin.jurusan.edit', compact('jurusan'));
    }

    /**
     * Memperbarui data jurusan di database.
     */
    public function update(Request $request, Jurusan $jurusan) // Menggunakan Route Model Binding
    {
        $request->validate([
            'nama_jurusan' => 'required|string|max:255|unique:jurusan,nama_jurusan,' . $jurusan->id, // Unique kecuali ID ini
        ]);

        $jurusan->update($request->all());

        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil diperbarui.');
    }

    /**
     * Menghapus jurusan dari database.
     */
    public function destroy(Jurusan $jurusan) // Menggunakan Route Model Binding
    {
        try {
            $jurusan->delete();
            return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Tangani error jika ada foreign key constraint
            return back()->with('error', 'Tidak dapat menghapus jurusan ini karena masih terkait dengan data pendaftar lain.');
        }
    }
}