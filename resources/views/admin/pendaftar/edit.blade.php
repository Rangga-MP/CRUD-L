    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Pendaftar - Admin PPDB</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
        </style>
    </head>
    <body class="bg-gray-100 flex flex-col min-h-screen">
        <nav class="bg-indigo-700 shadow-md p-4">
            <div class="container mx-auto flex justify-between items-center">
                <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold text-white">Admin PPDB</a>
                <div>
                    <a href="{{ route('admin.pendaftar.list') }}" class="text-white hover:text-indigo-200 px-3 py-2 rounded-md text-sm font-medium">Manajemen Pendaftar</a>
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium">Logout Admin</button>
                    </form>
                </div>
            </div>
        </nav>

        <main class="flex-grow container mx-auto p-4">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Sukses!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-3xl font-bold text-indigo-600 mb-6 text-center">Edit Data Pendaftar: {{ $pendaftar->nama_lengkap }}</h2>

                @if ($pendaftar)
                    <form action="{{ route('admin.pendaftar.update', $pendaftar->id_pendaftar) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT') {{-- Gunakan PUT method untuk update --}}

                        <div>
                            <label for="nisn" class="block text-gray-700 text-sm font-bold mb-2">NISN:</label>
                            <input type="text" id="nisn" name="nisn" value="{{ old('nisn', $pendaftar->nisn) }}"
                                   class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nisn') border-red-500 @enderror"
                                   required>
                            @error('nisn')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="nama_lengkap" class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap:</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $pendaftar->nama_lengkap) }}"
                                   class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nama_lengkap') border-red-500 @enderror"
                                   required>
                            @error('nama_lengkap')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="tempat_lahir" class="block text-gray-700 text-sm font-bold mb-2">Tempat Lahir:</label>
                                <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $pendaftar->tempat_lahir) }}"
                                       class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('tempat_lahir') border-red-500 @enderror"
                                       required>
                                @error('tempat_lahir')
                                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="tanggal_lahir" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Lahir:</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pendaftar->tanggal_lahir->format('Y-m-d')) }}"
                                       class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('tanggal_lahir') border-red-500 @enderror"
                                       required>
                                @error('tanggal_lahir')
                                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="jenis_kelamin" class="block text-gray-700 text-sm font-bold mb-2">Jenis Kelamin:</label>
                            <select id="jenis_kelamin" name="jenis_kelamin"
                                    class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('jenis_kelamin') border-red-500 @enderror"
                                    required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin', $pendaftar->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin', $pendaftar->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat:</label>
                            <textarea id="alamat" name="alamat" rows="3"
                                      class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('alamat') border-red-500 @enderror"
                                      required>{{ old('alamat', $pendaftar->alamat) }}</textarea>
                            @error('alamat')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="id_wilayah" class="block text-gray-700 text-sm font-bold mb-2">Wilayah:</label>
                            <select id="id_wilayah" name="id_wilayah"
                                    class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('id_wilayah') border-red-500 @enderror"
                                    required>
                                <option value="">Pilih Wilayah</option>
                                @foreach($wilayahs as $wilayah)
                                    <option value="{{ $wilayah->id }}" {{ old('id_wilayah', $pendaftar->id_wilayah) == $wilayah->id ? 'selected' : '' }}>{{ $wilayah->nama_wilayah }}</option>
                                @endforeach
                            </select>
                            @error('id_wilayah')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="asal_sekolah" class="block text-gray-700 text-sm font-bold mb-2">Asal Sekolah:</label>
                            <input type="text" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah', $pendaftar->asal_sekolah) }}"
                                   class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('asal_sekolah') border-red-500 @enderror"
                                   required>
                            @error('asal_sekolah')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="nilai_rata_rata" class="block text-gray-700 text-sm font-bold mb-2">Nilai Rata-rata:</label>
                            <input type="number" step="0.01" id="nilai_rata_rata" name="nilai_rata_rata" value="{{ old('nilai_rata_rata', $pendaftar->nilai_rata_rata) }}"
                                   class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nilai_rata_rata') border-red-500 @enderror"
                                   required>
                            @error('nilai_rata_rata')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="pilihan_jurusan" class="block text-gray-700 text-sm font-bold mb-2">Pilihan Jurusan:</label>
                            <select id="pilihan_jurusan" name="pilihan_jurusan"
                                    class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('pilihan_jurusan') border-red-500 @enderror"
                                    required>
                                <option value="">Pilih Jurusan</option>
                                @foreach($jurusan as $jrs)
                                    <option value="{{ $jrs->id }}" {{ old('pilihan_jurusan', $pendaftar->pilihan_jurusan) == $jrs->id ? 'selected' : '' }}>{{ $jrs->nama_jurusan }}</option>
                                @endforeach
                            </select>
                            @error('pilihan_jurusan')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full md:w-auto">
                                Update Data Pendaftar
                            </button>
                            <a href="{{ route('admin.pendaftar.detail', $pendaftar->id_pendaftar) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full md:w-auto text-center">
                                Batal
                            </a>
                        </div>
                    </form>
                @else
                    <p class="text-center text-xl text-gray-700">Data pendaftar tidak ditemukan.</p>
                @endif
            </div>
        </main>

        <footer class="bg-gray-800 text-white p-4 mt-8">
            <div class="container mx-auto text-center">
                <p>&copy; {{ date('Y') }} Admin PPDB Laravel. Hak Cipta Dilindungi.</p>
            </div>
        </footer>
    </body>
    </html>
    