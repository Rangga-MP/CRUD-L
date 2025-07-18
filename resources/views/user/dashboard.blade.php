    @extends('layouts.app')

    @section('title', 'Dashboard Pengguna')

    @section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold text-blue-600 mb-6">Selamat Datang, {{ Auth::user()->username }}!</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-blue-100 p-4 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-blue-800 mb-2">Status Pendaftaran</h3>
                @if ($pendaftar)
                    <p class="text-gray-700">NISN: <span class="font-medium">{{ $pendaftar->nisn }}</span></p>
                    <p class="text-gray-700">Nama: <span class="font-medium">{{ $pendaftar->nama_lengkap }}</span></p>
                    <p class="text-gray-700">Status Verifikasi:
                        <span class="font-bold
                            @if($pendaftar->status_verifikasi == 'terverifikasi') text-green-600
                            @elseif($pendaftar->status_verifikasi == 'ditolak') text-red-600
                            @else text-yellow-600 @endif">
                            {{ ucfirst($pendaftar->status_verifikasi) }}
                        </span>
                    </p>
                    <a href="{{ route('user.mydata') }}" class="mt-3 inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm">Lihat Detail Data</a>
                @else
                    <p class="text-gray-700">Anda belum mengisi data pendaftaran.</p>
                    <a href="{{ route('user.daftar.form') }}" class="mt-3 inline-block bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md text-sm">Isi Data Pendaftaran Sekarang</a>
                @endif
            </div>

            <div class="bg-green-100 p-4 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-green-800 mb-2">Informasi Penting</h3>
                <ul class="list-disc list-inside text-gray-700">
                    <li>Pastikan data Anda lengkap dan benar.</li>
                    <li>Pantau status verifikasi Anda secara berkala.</li>
                    <li>Hubungi admin jika ada pertanyaan.</li>
                </ul>
            </div>

            <div class="bg-yellow-100 p-4 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-yellow-800 mb-2">Aksi Cepat</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('user.mydata') }}" class="text-blue-600 hover:underline">Lihat Data Pendaftaran</a></li>
                    <li><a href="{{ route('user.report') }}" class="text-blue-600 hover:underline">Cetak Laporan Pendaftaran</a></li>
                    <li><a href="{{ route('user.verified') }}" class="text-blue-600 hover:underline">Cek Status Verifikasi</a></li>
                </ul>
            </div>
        </div>
    </div>
    @endsection
    