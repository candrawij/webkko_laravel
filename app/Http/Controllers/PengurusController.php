<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Support\Facades\Storage;

class PengurusController extends Controller
{
    public function anggota()
    {
        // Mengambil semua data pengurus tanpa filter jabatan tertentu
        $pimpinan = Pengurus::whereIn('jabatan', ['Pembina', 'Ketua Umum', 'Ketua Harian'])
            ->orderByRaw("FIELD(jabatan, 'Pembina', 'Ketua Umum', 'Ketua Harian')")
            ->get();
        
        // Menggunakan paginate agar jika datanya ratusan, halaman tidak terlalu panjang
        $semua_pengurus = Pengurus::paginate(12); 

        // Mengarahkan ke file view anggota.blade.php dengan membawa data semua pengurus
        return view('anggota', compact('semua_pengurus', 'pimpinan'));
    }

    public function showFotoPengurus($nama_file)
    {
        $path = 'pengurus/' . $nama_file;

        // 1. Cek apakah file benar-benar ada secara fisik di storage/app/pengurus/
        if (!Storage::disk('local')->exists($path)) {
            abort(404, 'File tidak ditemukan di storage local.');
        }

        // 2. Dapatkan jalur absolut (full path) fisik file di dalam server Laragon
        $absolutePath = Storage::disk('local')->path($path);

        // 3. Kembalikan file secara langsung. Laravel otomatis menebak Content-Type (MimeType) di balik layar!
        return response()->file($absolutePath);
    }
}
