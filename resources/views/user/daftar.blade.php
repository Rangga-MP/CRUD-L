    @extends('layouts.app')

    @section('title', 'Form Pendaftaran')

    @section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold text-blue-600 mb-6 text-center">Form Pendaftaran Peserta Didik Baru</h2>

        <form action="{{ route('user.daftar.submit') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="nisn" class="block text-gray-700 text-sm font-bold mb-2">NISN:</label>
                <input type="text" id="nisn" name="nisn" value="{{ old('nisn') }}"
                       class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nisn') border-red-500 @enderror"
                       required>
                @error('nisn')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="nama_lengkap" class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap:</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                       class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nama_lengkap') border-red-500 @enderror"
                       required>
                @error('nama_lengkap')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="tempat_lahir" class="block text-gray-700 text-sm font-bold mb-2">Tempat Lahir:</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                           class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('tempat_lahir') border-red-500 @enderror"
                           required>
                    @error('tempat_lahir')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="tanggal_lahir" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Lahir:</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
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
                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat:</label>
                <textarea id="alamat" name="alamat" rows="3"
                          class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('alamat') border-red-500 @enderror"
                          required>{{ old('alamat') }}</textarea>
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
                        <option value="{{ $wilayah->id }}" {{ old('id_wilayah') == $wilayah->id ? 'selected' : '' }}>{{ $wilayah->nama_wilayah }}</option>
                    @endforeach
                </select>
                @error('id_wilayah')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="asal_sekolah" class="block text-gray-700 text-sm font-bold mb-2">Asal Sekolah:</label>
                <input type="text" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah') }}"
                       class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('asal_sekolah') border-red-500 @enderror"
                       required>
                @error('asal_sekolah')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="nilai_rata_rata" class="block text-gray-700 text-sm font-bold mb-2">Nilai Rata-rata:</label>
                <input type="number" step="0.01" id="nilai_rata_rata" name="nilai_rata_rata" value="{{ old('nilai_rata_rata') }}"
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
                        <option value="{{ $jrs->id }}" {{ old('pilihan_jurusan') == $jrs->id ? 'selected' : '' }}>{{ $jrs->nama_jurusan }}</option>
                    @endforeach
                </select>
                @error('pilihan_jurusan')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full">
                    Simpan Data Pendaftaran
                </button>
            </div>
        </form>
    </div>
    @endsection
    