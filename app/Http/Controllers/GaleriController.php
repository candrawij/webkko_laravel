<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil parameter filter judul dari URL (?judul=nama_kegiatan)
        $filterJudul = $request->query('judul');

        // 2. Query ke database menggunakan Eloquent
        // Jika $filterJudul ada isinya, jalankan query WHERE. Jika tidak, ambil semua data.
        $resultGaleri = Galeri::when($filterJudul, function ($query, $judul) {
            return $query->where('judul', $judul);
            // Tips: kalau mau pencarian yang fleksibel (tidak harus sama persis), gunakan:
            // return $query->where('judul', 'like', '%' . $judul . '%');
        })->get();

        // 3. Lempar data hasil query ke file view galeri.blade.php
        return view('galeri', compact('resultGaleri'));
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
