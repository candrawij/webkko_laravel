<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class PengurusController extends Controller
{
    public function anggota()
    {
        $semua_pengurus = Cache::remember('semua_pengurus', 60, function () {
            return Pengurus::orderByRaw("CASE
                WHEN jabatan LIKE 'Pembina%' THEN 1
                WHEN jabatan LIKE 'Ketua Umum%' THEN 2
                WHEN jabatan LIKE 'Ketua Harian%' THEN 3
                WHEN jabatan LIKE 'Sekretaris%' THEN 4
                WHEN jabatan LIKE 'Bendahara%' THEN 5
                WHEN jabatan LIKE 'Bidang%' THEN 6
                WHEN jabatan LIKE 'Anggota%' THEN 7
                ELSE 99
            END")
            ->orderBy('id', 'asc')
            ->get();
        });

        // Mengarahkan ke file view anggota.blade.php dengan membawa data semua pengurus
        return view('anggota', compact('semua_pengurus'));
    }

    public function showFotoPengurus($nama_file)
    {
        $path = 'pengurus/' . $nama_file;

        // 1. Cek apakah file benar-benar ada secara fisik di storage/app/pengurus/
        if (!Storage::disk('local')->exists($path)) {
            abort(404, 'File tidak ditemukan di storage local.');
        }

        // 2. Dapatkan jalur absolut (full path) fisik file di dalam server Laragon
        $absolutePath = Cache::remember("pengurus_foto_path_{$nama_file}", 60, function () use ($path) {
            return Storage::disk('local')->path($path);
        });

        // 3. Kembalikan file secara langsung. Laravel otomatis menebak Content-Type (MimeType) di balik layar!
        return response()->file($absolutePath);
    }
}
