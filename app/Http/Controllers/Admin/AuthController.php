<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Untuk autentikasi

class AuthController extends Controller
{
    /**
     * Menampilkan form login admin.
     */
    public function showLoginForm()
    {
        // Jika admin sudah login, arahkan ke dashboard admin
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login'); // Akan mencari resources/views/admin/auth/login.blade.php
    }

    /**
     * Memproses permintaan login admin.
     */
    public function login(Request $request)
    {
        // Validasi input dari form
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Coba melakukan autentikasi menggunakan guard 'admin'
        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate(); // Regenerasi session ID untuk keamanan

            // Arahkan admin ke dashboard setelah login berhasil
            return redirect()->intended(route('admin.dashboard'));
        }

        // Jika login gagal, kembali ke form login dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password admin salah.',
        ])->onlyInput('username');
    }

    /**
     * Memproses permintaan logout admin.
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout(); // Logout admin dari guard 'admin'

        $request->session()->invalidate(); // Hapus session
        $request->session()->regenerateToken(); // Regenerasi CSRF token

        return redirect()->route('admin.login')->with('success', 'Anda telah berhasil logout dari panel admin.'); // Arahkan ke halaman login admin
    }
}