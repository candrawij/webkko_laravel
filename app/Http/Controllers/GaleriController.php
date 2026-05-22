<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil parameter filter judul dari URL (?judul=nama_kegiatan) (Tidak lagi digunakan untuk filter backend)
        $filterJudul = $request->query('judul');

        // Ambil daftar judul unik untuk filter dropdown
        $judulList = Galeri::select('judul')->distinct()->orderBy('judul', 'asc')->pluck('judul');

        // 2. Query ke database menggunakan Eloquent (Ambil SEMUA data agar bisa difilter via JavaScript tanpa reload)
        $resultGaleri = Galeri::all();

        // 3. Lempar data hasil query ke file view galeri.blade.php
        return view('galeri', compact('resultGaleri', 'judulList', 'filterJudul'));
    }

    // Opsional: Jika album diklik dan ingin masuk ke halaman detail foto-foto di dalamnya
    public function show($id)
    {
        $galeri = Galeri::findOrFail($id);
        
        return view('galeri-detail', compact('galeri'));
    }

    public function showFotoGaleri($nama_file)
    {
        // Ini sudah sangat tepat untuk membaca C:\laragon\www\web_kko\public\storage\kegiatan\nama_file.jpg
        $absolutePath = public_path('storage/galeri' . DIRECTORY_SEPARATOR . $nama_file);

        if (!file_exists($absolutePath)) {
            abort(404, 'File gambar galeri tidak ditemukan.');
        }

        return response()->file($absolutePath);
    }
}
