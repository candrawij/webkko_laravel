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

        // 2. Ambil List Berita (6 data)
        $berita_list = Berita::where('status', 'published')
                            ->where('kategori', 'berita')
                            ->latest()
                            ->paginate(6); // Lebih baik pakai paginate daripada limit

        // 3. Ambil Recent Posts (5 data)
        $recent = Berita::where('status', 'published')
                        ->where('kategori', 'berita')
                        ->select('judul', 'slug')
                        ->latest()
                        ->take(5)
                        ->get();

        return view('berita', compact('highlight', 'berita_list', 'recent'));
    }
}
