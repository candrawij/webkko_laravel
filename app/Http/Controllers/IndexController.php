<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kegiatan;
use App\Models\Pengurus;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        // 1. Ambil pimpinan inti
        $pimpinan = Pengurus::whereIn('jabatan', ['Pembina', 'Ketua Umum', 'Ketua Harian'])
            ->orderByRaw("FIELD(jabatan, 'Pembina', 'Ketua Umum', 'Ketua Harian')")
            ->get();

        // 2. Ambil 3 kegiatan terbaru
        $kegiatan_terbaru = Kegiatan::latest('tanggal')->take(3)->get();

        // 3. Ambil 4 berita terbaru (1 highlight, 3 list)
        $berita_terbaru = Berita::latest()->take(4)->get();

        // Kirim semua ke view index
        return view('index', compact('pimpinan', 'kegiatan_terbaru', 'berita_terbaru'));
    }
}
