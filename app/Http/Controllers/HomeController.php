<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama aplikasi.
     * Ini akan menggantikan logika dari index.php lama.
     */
    public function index()
    {
        // Tidak perlu redirect ke dashboard jika sudah login, biarkan homepage tetap bisa diakses
        // if (Auth::check()) {
        //     return redirect()->route('user.dashboard');
        // }

        // Mengembalikan view 'welcome' yang sekarang meng-extend layouts.homepage
        return view('welcome');
    }
}