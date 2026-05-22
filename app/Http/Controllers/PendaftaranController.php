<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    // Halaman Form Pendaftaran (Bergabung)
    public function create()
    {
        return view('pendaftaran.create');
    }

    // Proses Submit Pendaftaran
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'pendidikan_terakhir' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        Pendaftar::create([
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'status' => 'pending', // default status
        ]);

        return redirect()->route('pendaftaran.create')->with('success', 'Pendaftaran berhasil disimpan!');
    }

    // Halaman Cek Status
    public function cekStatus()
    {
        return view('pendaftaran.cek_status');
    }

    // Proses Cek Status
    public function submitCekStatus(Request $request)
    {
        $keyword = $request->input('keyword');

        $pendaftar = Pendaftar::where('email', $keyword)
            ->orWhere('no_hp', $keyword)
            ->first();

        return view('pendaftaran.cek_status', compact('pendaftar', 'keyword'));
    }
}
