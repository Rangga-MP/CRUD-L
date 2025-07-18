    @extends('layouts.app')

    @section('title', 'Data Pendaftaran Saya')

    @section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold text-blue-600 mb-6 text-center">Data Pendaftaran Saya</h2>

        @if ($pendaftar)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
                <div class="p-4 bg-gray-50 rounded-lg">
                    <p class="font-semibold text-lg mb-2">Informasi Pribadi:</p>
                    <p><strong>NISN:</strong> {{ $pendaftar->nisn }}</p>
                    <p><strong>Nama Lengkap:</strong> {{ $pendaftar->nama_lengkap }}</p>
                    <p><strong>Tempat, Tanggal Lahir:</strong> {{ $pendaftar->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->format('d F Y') }}</p>
                    <p><strong>Jenis Kelamin:</strong> {{ $pendaftar->jenis_kelamin }}</p>
                    <p><strong>Alamat:</strong> {{ $pendaftar->alamat }}</p>
                    <p><strong>Wilayah:</strong> {{ $pendaftar->wilayah->nama_wilayah ?? 'N/A' }}</p>
                </div>
                <div class="p-4 bg-gray-50 rounded-lg">
                    <p class="font-semibold text-lg mb-2">Informasi Pendidikan & Pendaftaran:</p>
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

            <div class="mt-6 text-center">
                <a href="{{ route('user.report') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white px-6 py-3 rounded-lg font-bold text-lg inline-block">Cetak Laporan Pendaftaran</a>
            </div>

        @else
            <div class="text-center p-8 border border-gray-300 rounded-lg bg-gray-50">
                <p class="text-xl text-gray-700 mb-4">Anda belum mengisi data pendaftaran.</p>
                <a href="{{ route('user.daftar.form') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-bold text-lg inline-block">Isi Data Pendaftaran Sekarang</a>
            </div>
        @endif
    </div>
    @endsection
    