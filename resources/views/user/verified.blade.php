    @extends('layouts.app')

    @section('title', 'Status Verifikasi')

    @section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
        <h2 class="text-3xl font-bold text-blue-600 mb-6">Status Verifikasi Pendaftaran Anda</h2>

        @if ($pendaftar)
            @if ($pendaftar->status_verifikasi == 'terverifikasi')
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                    <p class="font-bold text-2xl">Selamat!</p>
                    <p class="text-xl">Data pendaftaran Anda telah <span class="font-bold">TERVERIFIKASI</span>.</p>
                </div>
                <p class="text-gray-700 text-lg mb-4">Anda sekarang dapat melanjutkan ke proses selanjutnya.</p>
            @elseif ($pendaftar->status_verifikasi == 'ditolak')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                    <p class="font-bold text-2xl">Mohon Maaf.</p>
                    <p class="text-xl">Data pendaftaran Anda <span class="font-bold">DITOLAK</span>.</p>
                </div>
                <p class="text-gray-700 text-lg mb-4">Silakan hubungi administrator untuk informasi lebih lanjut mengenai alasan penolakan.</p>
            @else
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-6" role="alert">
                    <p class="font-bold text-2xl">Status: Pending</p>
                    <p class="text-xl">Data pendaftaran Anda sedang dalam proses <span class="font-bold">VERIFIKASI</span>.</p>
                </div>
                <p class="text-gray-700 text-lg mb-4">Mohon bersabar, kami akan segera memberitahu Anda setelah proses verifikasi selesai.</p>
            @endif

            <p class="text-gray-600 text-sm mt-8">
                Untuk melihat detail data Anda, kunjungi halaman <a href="{{ route('user.mydata') }}" class="text-blue-500 hover:text-blue-700 font-bold">Data Saya</a>.
            </p>

        @else
            <div class="text-center p-8 border border-gray-300 rounded-lg bg-gray-50">
                <p class="text-xl text-gray-700 mb-4">Anda belum mengisi data pendaftaran.</p>
                <a href="{{ route('user.daftar.form') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-bold text-lg inline-block">Isi Data Pendaftaran Sekarang</a>
            </div>
        @endif
    </div>
    @endsection
    