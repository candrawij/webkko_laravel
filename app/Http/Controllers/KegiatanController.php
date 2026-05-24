<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class KegiatanController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel kegiatan, diurutkan dari yang terbaru
        $semua_kegiatan = Cache::remember('semua_kegiatan', 60, function () {
            return Kegiatan::orderBy('tanggal', 'desc')->get();
        });

        // Mengirim data ke file view kegiatan.blade.php
        return view('kegiatan', compact('semua_kegiatan'));
    }

    // Fungsi untuk melihat detail satu kegiatan saat diklik
    public function show($id)
    {
        $kegiatan = Kegiatan::where('id', $id)->first();

        if (!$kegiatan) {
            abort(404, 'Kegiatan tidak ditemukan');
        }

        return view('kegiatan-detail', compact('kegiatan'));
    }

    public function showFotoKegiatan($nama_file)
    {

        // Karena aset ditaruh di folder public/kegiatan/ luar:
        // Karena aset ditaruh di folder public/storage/kegiatan/
        $absolutePath = public_path('storage/kegiatan' . DIRECTORY_SEPARATOR . $nama_file);

        // Cek apakah file benar-benar ada di folder public/kegiatan/
        // Cek apakah file benar-benar ada di folder public/storage/kegiatan/
        if (!file_exists($absolutePath)) {
            abort(404, 'File gambar kegiatan tidak ditemukan.');
        }

        // Kembalikan respons file gambar utuh ke browser
        return response()->file($absolutePath);
    }
}
