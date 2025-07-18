<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wilayah; // Import Model Wilayah

class WilayahController extends Controller
{
    /**
     * Menampilkan daftar semua wilayah.
     */
    public function index()
    {
        $wilayahs = Wilayah::orderBy('nama_wilayah')->get();
        return view('admin.wilayah.index', compact('wilayahs'));
    }

    /**
     * Menampilkan form untuk membuat wilayah baru.
     */
    public function create()
    {
        return view('admin.wilayah.create');
    }

    /**
     * Menyimpan wilayah baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_wilayah' => 'required|string|max:255|unique:wilayah,nama_wilayah',
        ]);

        Wilayah::create($request->all());

        return redirect()->route('admin.wilayah.index')->with('success', 'Wilayah berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit wilayah.
     */
    public function edit(Wilayah $wilayah) // Menggunakan Route Model Binding
    {
        return view('admin.wilayah.edit', compact('wilayah'));
    }

    /**
     * Memperbarui data wilayah di database.
     */
    public function update(Request $request, Wilayah $wilayah) // Menggunakan Route Model Binding
    {
        $request->validate([
            'nama_wilayah' => 'required|string|max:255|unique:wilayah,nama_wilayah,' . $wilayah->id, // Unique kecuali ID ini
        ]);

        $wilayah->update($request->all());

        return redirect()->route('admin.wilayah.index')->with('success', 'Wilayah berhasil diperbarui.');
    }

    /**
     * Menghapus wilayah dari database.
     */
    public function destroy(Wilayah $wilayah) // Menggunakan Route Model Binding
    {
        try {
            $wilayah->delete();
            return redirect()->route('admin.wilayah.index')->with('success', 'Wilayah berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Tangani error jika ada foreign key constraint (misal: wilayah masih digunakan oleh pendaftar)
            return back()->with('error', 'Tidak dapat menghapus wilayah ini karena masih terkait dengan data pendaftar lain.');
        }
    }
}