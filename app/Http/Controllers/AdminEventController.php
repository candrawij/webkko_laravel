<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Str;

class AdminEventController extends Controller
{
    public function action(Request $request)
    {
        // ==== HAPUS ====
        if ($request->isMethod('post') && $request->has('hapus')) {
            $id = $request->input('id');
            Event::where('id', $id)->delete();

            return back()->with('success', 'Kegiatan berhasil dihapus');
        }

        // ==== TAMBAH EVENT ====
        if ($request->isMethod('post') && $request->has('simpan')) {
            $nama_event = $request->input('nama_event');
            $deskripsi = $request->input('deskripsi');
            $tanggal = $request->input('tanggal_event');
            $lokasi = $request->input('lokasi');

            // generate token unik
            $token = bin2hex(random_bytes(16));

            Event::create([
                'nama_event' => $nama_event,
                'deskripsi' => $deskripsi,
                'tanggal_event' => $tanggal,
                'lokasi' => $lokasi,
                'token' => $token
            ]);

            return back()->with('success', 'Kegiatan berhasil dibuat');
        }

        return back();
    }

    public function generateQr(Request $request)
    {
        $data = $request->query('data');
        if (!$data) {
            abort(400, 'Data is required');
        }

        $url = 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' . urlencode($data);
        $image = file_get_contents($url);

        return response($image)->header('Content-Type', 'image/png');
    }
}
