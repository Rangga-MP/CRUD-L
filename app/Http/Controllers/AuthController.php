<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Untuk autentikasi
use Illuminate\Support\Facades\Hash; // Untuk hashing password
use App\Models\User; // Menggunakan Model User yang sudah kita buat

class AuthController extends Controller
{
    /**
     * Menampilkan form login.
     * Menggantikan bagian tampilan dari login.php.
     */
    public function showLoginForm()
    {
        // Jika user sudah login, arahkan ke dashboard
        if (Auth::check()) {
            return redirect()->route('user.dashboard');
        }
        return view('auth.login'); // Akan mencari file resources/views/auth/login.blade.php
    }

    /**
     * Memproses permintaan login.
     * Menggantikan logika POST dari login.php.
     */
    public function login(Request $request)
    {
        // Validasi input dari form
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Coba melakukan autentikasi
        // Auth::attempt akan mencoba menemukan user berdasarkan credentials
        // dan memverifikasi password yang sudah di-hash
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenerasi session ID untuk keamanan

            // Arahkan user ke dashboard setelah login berhasil
            return redirect()->intended(route('user.dashboard'));
        }

        // Jika login gagal, kembali ke form login dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    /**
     * Menampilkan form registrasi.
     * Menggantikan bagian tampilan dari register.php.
     */
    public function showRegistrationForm()
    {
        // Jika user sudah login, arahkan ke dashboard
        if (Auth::check()) {
            return redirect()->route('user.dashboard');
        }
        return view('auth.register'); // Akan mencari file resources/views/auth/register.blade.php
    }

    /**
     * Memproses permintaan registrasi.
     * Menggantikan logika POST dari register.php.
     */
    public function register(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'username' => 'required|string|max:255|unique:users', // Pastikan username unik di tabel users
            'email' => 'required|string|email|max:255|unique:users', // Pastikan email unik
            'password' => 'required|string|min:8|confirmed', // Password minimal 8 karakter dan harus sama dengan password_confirmation
        ]);

        // Buat user baru
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password sebelum disimpan!
        ]);

        // Login user secara otomatis setelah registrasi
        Auth::login($user);

        // Arahkan ke dashboard user setelah registrasi berhasil
        return redirect()->route('user.dashboard')->with('success', 'Registrasi berhasil! Selamat datang.');
    }

    /**
     * Memproses permintaan logout.
     * Menggantikan logika dari logout.php.
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Logout user

        $request->session()->invalidate(); // Hapus session
        $request->session()->regenerateToken(); // Regenerasi CSRF token

        return redirect('/')->with('success', 'Anda telah berhasil logout.'); // Arahkan ke halaman utama
    }
}