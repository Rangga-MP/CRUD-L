        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Manajemen Wilayah - Admin PPDB</title>
            <script src="https://cdn.tailwindcss.com"></script>
            <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
            <style>
                body { font-family: 'Inter', sans-serif; }
            </style>
        </head>
        <body class="bg-gray-100 flex flex-col min-h-screen">
            <nav class="bg-indigo-700 shadow-md p-4">
                <div class="container mx-auto flex justify-between items-center">
                    <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold text-white">Admin PPDB</a>
                    <div>
                        <a href="{{ route('admin.pendaftar.list') }}" class="text-white hover:text-indigo-200 px-3 py-2 rounded-md text-sm font-medium">Manajemen Pendaftar</a>
                        <a href="{{ route('admin.wilayah.index') }}" class="text-white hover:text-indigo-200 px-3 py-2 rounded-md text-sm font-medium">Manajemen Wilayah</a>
                        <a href="{{ route('admin.jurusan.index') }}" class="text-white hover:text-indigo-200 px-3 py-2 rounded-md text-sm font-medium">Manajemen Jurusan</a>
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
                    <h2 class="text-3xl font-bold text-indigo-600 mb-6">Manajemen Wilayah</h2>

                    <div class="mb-4 text-right">
                        <a href="{{ route('admin.wilayah.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium">Tambah Wilayah Baru</a>
                    </div>

                    @if($wilayahs->isEmpty())
                        <p class="text-gray-700 text-center">Belum ada data wilayah.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white rounded-lg shadow-md">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">ID</th>
                                        <th class="py-3 px-6 text-left">Nama Wilayah</th>
                                        <th class="py-3 px-6 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    @foreach($wilayahs as $wilayah)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="py-3 px-6 text-left">{{ $wilayah->id }}</td>
                                            <td class="py-3 px-6 text-left">{{ $wilayah->nama_wilayah }}</td>
                                            <td class="py-3 px-6 text-center whitespace-nowrap">
                                                <a href="{{ route('admin.wilayah.edit', $wilayah->id) }}" class="text-yellow-600 hover:text-yellow-800 font-medium mr-3">Edit</a>
                                                <form action="{{ route('admin.wilayah.destroy', $wilayah->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus wilayah ini? Ini akan gagal jika ada pendaftar yang terkait.');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
        