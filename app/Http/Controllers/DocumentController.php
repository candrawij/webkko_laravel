<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $legalDocuments = [
            (object)[
                'title' => 'SK Kemenkumham',
                'description' => 'Surat Keputusan Pengesahan Badan Hukum KKO Paud',
                'file' => 'Kemenkumham.pdf',
                'badge' => 'Disahkan',
                'icon' => 'bi-file-earmark-text'
            ],
            (object)[
                'title' => 'SK KKO',
                'description' => 'Surat Keputusan KKO Paud Masa 2025-2029',
                'file' => 'SK_KKO.pdf',
                'badge' => 'Otentik',
                'icon' => 'bi-file-earmark-check'
            ],
            (object)[
                'title' => 'SK Keberadaan Kesbangpol',
                'description' => 'Surat Keputusan Keberadaan dari Kesatuan Bangsa dan Politik',
                'file' => 'Kesbangpol.pdf',
                'badge' => 'Resmi',
                'icon' => 'bi-building'
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
