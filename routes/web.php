<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\BlogController; // Memanggil Controller Publik Baru

/*
|--------------------------------------------------------------------------
| ROUTE HALAMAN PUBLIK PENGUNJUNG (Bebas Akses Tanpa Login)
|--------------------------------------------------------------------------
*/

// Halaman Utama / Beranda Publik (Menampilkan 5 Artikel Terbaru & Filter Kategori)
Route::get('/', [BlogController::class, 'index'])->name('publik.index');

// Halaman Detail Artikel (Menampilkan Isi Lengkap Artikel & 5 Artikel Terkait)
Route::get('/blog/artikel/{id}', [BlogController::class, 'show'])->name('publik.show');


/*
|--------------------------------------------------------------------------
| ROUTE SISTEM AUTENTIKASI (Bab 9)
|--------------------------------------------------------------------------
*/

// Login
Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [LoginController::class, 'proses'])
    ->name('login.proses')
    ->middleware('guest');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');


/*
|--------------------------------------------------------------------------
| ROUTE PROTEKSI CMS ADMIN (Harus Login / Bab 10)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard Utama Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // CRUD Utama Artikel
    Route::resource('artikel', ArtikelController::class);

    // CRUD Data Penulis
    Route::resource('penulis', PenulisController::class)
        ->except(['show']);

    // CRUD Kategori Artikel
    Route::resource('kategori', KategoriArtikelController::class)
        ->except(['show']);
});