<?php

use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/anggota', function () {
    return view('anggota');
});

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