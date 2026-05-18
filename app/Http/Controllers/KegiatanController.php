<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel kegiatan, diurutkan dari yang terbaru
        $semua_kegiatan = Kegiatan::latest('tanggal')->get();

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
}
