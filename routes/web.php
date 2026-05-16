<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PengurusController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PengurusController::class, 'index'])->name('index');

Route::get('/anggota', [PengurusController::class, 'anggota'])->name('anggota');

Route::get('/kegiatan', function () {
    return view('kegiatan');
});

Route::get('/berita', [BeritaController::class, 'index'])->name('berita');

Route::get('/galeri', function () {
    return view('galeri');
});

Route::get('/legalitas', function () {
    return view('legalitas');
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/login', function () {
    return view('login');
});