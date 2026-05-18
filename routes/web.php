<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PengurusController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/anggota', [PengurusController::class, 'anggota'])->name('anggota');

Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
Route::get('/kegiatan/{id}', [KegiatanController::class, 'show'])->name('kegiatan.show');

Route::get('/berita', [BeritaController::class, 'index'])->name('berita');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('/galeri/{id}', [GaleriController::class, 'show'])->name('galeri.show');

Route::get('/legalitas', function () {
    return view('legalitas');
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/login', function () {
    return view('login');
});