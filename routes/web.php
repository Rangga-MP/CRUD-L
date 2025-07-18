<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // Import HomeController
use App\Http\Controllers\AuthController; // Import AuthController
use App\Http\Controllers\UserController; // Import UserController
use App\Http\Controllers\Admin; // Import namespace Admin untuk Controllers admin

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rute untuk Halaman Utama (index.php)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute untuk Autentikasi Pengguna Biasa (Login, Register, Logout)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk Autentikasi Admin (HARUS DI LUAR MIDDLEWARE 'auth' PENGGUNA BIASA)
Route::prefix('admin')->group(function () {
    Route::get('/login', [Admin\AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [Admin\AuthController::class, 'login']);
    Route::post('/logout', [Admin\AuthController::class, 'logout'])->name('admin.logout');
});


// Grup Rute yang Membutuhkan Autentikasi Pengguna Biasa
Route::middleware(['auth'])->group(function () {
    // Rute Dashboard Pengguna (user/index.php)
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    // Rute untuk Pendaftaran Data (user/daftar.php, user/submit.php, user/mydata.php)
    Route::get('/user/daftar', [UserController::class, 'showDaftarForm'])->name('user.daftar.form');
    Route::post('/user/daftar', [UserController::class, 'submitDaftar'])->name('user.daftar.submit');
    Route::get('/user/mydata', [UserController::class, 'myData'])->name('user.mydata');

    // Rute untuk Laporan (user/report.php)
    Route::get('/user/report', [UserController::class, 'report'])->name('user.report');

    // Rute untuk Verifikasi (user/verified.php)
    Route::get('/user/verified', [UserController::class, 'verified'])->name('user.verified');
});


// Grup Rute yang Membutuhkan Autentikasi Admin
Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [Admin\AdminController::class, 'index'])->name('admin.dashboard');

    // Manajemen Pendaftar
    Route::get('/pendaftar', [Admin\AdminController::class, 'listPendaftar'])->name('admin.pendaftar.list');
    Route::get('/pendaftar/{id}/detail', [Admin\AdminController::class, 'showPendaftarDetail'])->name('admin.pendaftar.detail');
    Route::post('/pendaftar/{id}/verify', [Admin\AdminController::class, 'verifyPendaftar'])->name('admin.pendaftar.verify');
    Route::get('/pendaftar/{id}/edit', [Admin\AdminController::class, 'editPendaftar'])->name('admin.pendaftar.edit');
    Route::put('/pendaftar/{id}/update', [Admin\AdminController::class, 'updatePendaftar'])->name('admin.pendaftar.update');
    Route::delete('/pendaftar/{id}/delete', [Admin\AdminController::class, 'deletePendaftar'])->name('admin.pendaftar.delete');

    // Manajemen Wilayah
    Route::resource('wilayah', Admin\WilayahController::class)->except(['show']);

    // Manajemen Jurusan
    Route::resource('jurusan', Admin\JurusanController::class)->except(['show']);
});
