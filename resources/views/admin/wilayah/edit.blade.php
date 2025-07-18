        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Jurusan - Admin PPDB</title>
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
                <div class="bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">
                    <h2 class="text-3xl font-bold text-indigo-600 mb-6 text-center">Edit Jurusan: {{ $jurusan->nama_jurusan }}</h2>

                    <form action="{{ route('admin.jurusan.update', $jurusan->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT') {{-- Gunakan PUT method untuk update --}}
                        <div>
                            <label for="nama_jurusan" class="block text-gray-700 text-sm font-bold mb-2">Nama Jurusan:</label>
                            <input type="text" id="nama_jurusan" name="nama_jurusan" value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}"
                                   class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nama_jurusan') border-red-500 @enderror"
                                   required autofocus>
                            @error('nama_jurusan')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full">
                                Update Jurusan
                            </button>
                        </div>
                    </form>

                    <div class="mt-4 text-center">
                        <a href="{{ route('admin.jurusan.index') }}" class="text-indigo-500 hover:text-indigo-700 font-bold text-sm">Kembali ke Daftar Jurusan</a>
                    </div>
                </div>
            </main>

            <footer class="bg-gray-800 text-white p-4 mt-8">
                <div class="container mx-auto text-center">
                    <p>&copy; {{ date('Y') }} Admin PPDB Laravel. Hak Cipta Dilindungi.</p>
                </div>
            </footer>
        </body>
        </html>
        