<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;

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
}
