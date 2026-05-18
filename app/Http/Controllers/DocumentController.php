<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        // Menyusun data array objek sesuai dengan properti yang diminta di file Blade kamu
        $legalDocuments = [
            (object)[
                'badge' => 'Otentik',
                'title' => 'SK KKO',
                'description' => 'Surat Keputusan KKO Paud Masa 2025-2029.',
                'file' => 'SK_KKO.pdf' // Nama file asli yang disimpan di storage/app/legalitas/
            ],
            (object)[
                'badge' => 'Disahkan',
                'title' => 'SK Kemenkumham',
                'description' => 'Surat Keputusan Pengesahan Badan Hukum KKO Paud.',
                'file' => 'Kemenkumham.pdf'
            ],
            (object)[
                'badge' => 'Resmi',
                'title' => 'SK Keberadaan Kesbangpol',
                'description' => 'Surat Keputusan Keberadaan dari Kesatuan Bangsa dan Politik.',
                'file' => 'Kesbangpol.pdf'
            ]
        ];

        // Lempar variabel $legalDocuments ke view halaman legalitas kamu
        return view('legalitas', compact('legalDocuments'));
    }

    public function downloadLegalitas($nama_file)
    {
        // 1. Tentukan path file di folder terproteksi
        $pathFisik = 'legalitas/' . $nama_file;

        // 2. Cek apakah filenya benar-benar ada
        if (!Storage::exists($pathFisik)) {
            abort(404, 'Dokumen tidak ditemukan');
        }

        // 3. Download file secara aman menggunakan method Storage::download()
        return Storage::download($pathFisik);
    }
}
