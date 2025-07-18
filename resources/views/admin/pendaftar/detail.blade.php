    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detail Pendaftar - Admin PPDB</title>
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
                <h2 class="text-3xl font-bold text-indigo-600 mb-6 text-center">Detail Pendaftar: {{ $pendaftar->nama_lengkap }}</h2>

                @if ($pendaftar)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700 mb-6">
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="font-semibold text-lg mb-2">Informasi Pribadi:</p>
                            <p><strong>ID Pendaftar:</strong> {{ $pendaftar->id_pendaftar }}</p>
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
                            <p><strong>Akun User:</strong> {{ $pendaftar->user->username ?? 'N/A' }} (ID: {{ $pendaftar->user_id }})</p>
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

                    <div class="mt-6 flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                        <form action="{{ route('admin.pendaftar.verify', $pendaftar->id_pendaftar) }}" method="POST" class="inline-block">
                            @csrf
                            <input type="hidden" name="status" value="terverifikasi">
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-bold text-lg">Verifikasi</button>
                        </form>
                        <form action="{{ route('admin.pendaftar.verify', $pendaftar->id_pendaftar) }}" method="POST" class="inline-block">
                            @csrf
                            <input type="hidden" name="status" value="ditolak">
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-lg font-bold text-lg">Tolak</button>
                        </form>
                        <a href="{{ route('admin.pendaftar.edit', $pendaftar->id_pendaftar) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-lg font-bold text-lg text-center">Edit Data</a>
                        <a href="{{ route('admin.pendaftar.list') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-bold text-lg text-center">Kembali ke Daftar</a>
                    </div>

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
    