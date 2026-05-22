<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        // 1. Ambil data Highlight
        $highlight = Berita::where('status', 'published')
                            ->where('kategori', 'berita')
                            ->where('is_highlighted', 1)
                            ->latest()
                            ->first();

        // 2. Ambil List Berita (6 data) sesuai request user
        $berita_list = Berita::where('status', 'published')
                            ->where('kategori', 'berita')
                            ->latest()
                            ->take(6)
                            ->get();

        // 3. Ambil Recent Posts (5 data)
        $recent = Berita::where('status', 'published')
                        ->where('kategori', 'berita')
                        ->select('judul', 'slug')
                        ->latest()
                        ->take(5)
                        ->get();

        return view('berita', compact('highlight', 'berita_list', 'recent'));
    }

    public function show($slug)
    {
        // 1. Validasi & Ambil Detail Berita
        $data = Berita::where('slug', $slug)
                      ->where('status', 'published')
                      ->first();

        if (!$data) {
            abort(404, 'Berita tidak ditemukan');
        }

        // 2. Ambil Recent Posts kecuali berita yang sedang dibuka
        $recent = Berita::where('status', 'published')
                        ->where('id', '!=', $data->id)
                        ->select('judul', 'slug')
                        ->latest()
                        ->take(5)
                        ->get();

        return view('detail_berita', compact('data', 'recent'));
    }
}
