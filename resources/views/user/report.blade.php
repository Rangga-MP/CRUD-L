    @extends('layouts.app')

    @section('title', 'Laporan Pendaftaran')

    @section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold text-blue-600 mb-6 text-center">Laporan Pendaftaran Peserta Didik Baru</h2>

        @if ($pendaftar)
            <div class="border border-gray-300 p-6 rounded-lg mb-6">
                <h3 class="text-xl font-semibold mb-4">Detail Pendaftar:</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
                    <div>
                        <p><strong>Nama Pendaftar:</strong> {{ $pendaftar->nama_lengkap }}</p>
                        <p><strong>NISN:</strong> {{ $pendaftar->nisn }}</p>
                        <p><strong>Tempat, Tanggal Lahir:</strong> {{ $pendaftar->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->format('d F Y') }}</p>
                        <p><strong>Jenis Kelamin:</strong> {{ $pendaftar->jenis_kelamin }}</p>
                        <p><strong>Alamat:</strong> {{ $pendaftar->alamat }}</p>
                        <p><strong>Wilayah:</strong> {{ $pendaftar->wilayah->nama_wilayah ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p><strong>Asal Sekolah:</strong> {{ $pendaftar->asal_sekolah }}</p>
                        <p><strong>Nilai Rata-rata:</strong> {{ $pendaftar->nilai_rata_rata }}</p>
                        <p><strong>Pilihan Jurusan:</strong> {{ $pendaftar->jurusan->nama_jurusan ?? 'N/A' }}</p>
                        <p><strong>Tanggal Daftar:</strong> {{ \Carbon\Carbon::parse($pendaftar->tanggal_daftar)->format('d F Y H:i') }}</p>
                        <p><strong>Status Verifikasi:</strong>
                            <span class="font-bold
                                @if($pendaftar->status_verifikasi == 'terverifikasi') text-green-600
                                @elseif($pendaftar->status_verifikasi == 'ditolak') text-red-600
                                @else text-yellow-600 @endif">
                                {{ ucfirst($pendaftar->status_verifikasi) }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <!-- Tombol cetak (bisa menggunakan JavaScript window.print()) -->
                <button onclick="window.print()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
                    Cetak Laporan
                </button>
                <a href="{{ route('user.mydata') }}" class="ml-4 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
                    Kembali ke Data Saya
                </a>
            </div>

        @else
            <div class="text-center p-8 border border-gray-300 rounded-lg bg-gray-50">
                <p class="text-xl text-gray-700 mb-4">Tidak ada data pendaftaran untuk ditampilkan laporan.</p>
                <a href="{{ route('user.daftar.form') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-bold text-lg inline-block">Isi Data Pendaftaran Sekarang</a>
            </div>
        @endif
    </div>
    @endsection
    