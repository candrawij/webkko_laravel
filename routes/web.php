<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PengurusController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/mars', function () {
    return view('mars');
})->name('mars');

Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/anggota', [PengurusController::class, 'anggota'])->name('anggota');
Route::get('/gambar-pengurus/{nama_file}', [PengurusController::class, 'showFotoPengurus'])->name('pengurus.foto');

Route::get('/pendaftaran', [App\Http\Controllers\PendaftaranController::class, 'create'])->name('pendaftaran.create');
Route::post('/pendaftaran', [App\Http\Controllers\PendaftaranController::class, 'store'])->name('pendaftaran.store');
Route::get('/cek-status', [App\Http\Controllers\PendaftaranController::class, 'cekStatus'])->name('pendaftaran.cek');
Route::post('/cek-status', [App\Http\Controllers\PendaftaranController::class, 'submitCekStatus'])->name('pendaftaran.cek.submit');

Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
Route::get('/kegiatan/{id}', [KegiatanController::class, 'show'])->name('kegiatan.show');
Route::get('/gambar-kegiatan/{nama_file}', [KegiatanController::class, 'showFotoKegiatan'])->name('kegiatan.foto');

Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('/galeri/{id}', [GaleriController::class, 'show'])->name('galeri.show');
Route::get('/gambar-galeri/{nama_file}', [GaleriController::class, 'showFotoGaleri'])->name('galeri.foto');

Route::get('/legalitas', [DocumentController::class, 'index'])->name('legalitas.index');

Route::get('/download-legalitas/{nama_file}', [DocumentController::class, 'downloadLegalitas'])
     ->name('legalitas.download');

Route::get('/kontak', function () {
    return view('kontak');
});

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\AdminPengurusController;
Route::post('/admin-pengurus-action', [AdminPengurusController::class, 'action'])->name('admin.pengurus.action');

use App\Http\Controllers\AdminPendaftarController;
Route::match(['get', 'post'], '/admin-pendaftar-action', [AdminPendaftarController::class, 'action'])->name('admin.pendaftar.action');

use App\Http\Controllers\AdminKegiatanController;
Route::match(['get', 'post'], '/admin-kegiatan-action', [AdminKegiatanController::class, 'action'])->name('admin.kegiatan.action');

use App\Http\Controllers\AdminEventController;
Route::post('/admin-event-action', [AdminEventController::class, 'action'])->name('admin.event.action');
Route::get('/generate-qr', [AdminEventController::class, 'generateQr'])->name('generate.qr');