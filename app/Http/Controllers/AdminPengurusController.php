<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengurus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminPengurusController extends Controller
{
    public function action(Request $request)
    {
        $hlm = $request->query('hlm', 1);
        $fotoFolder = public_path('assets/foto_pengurus/');
        
        if (!File::exists($fotoFolder)) {
            File::makeDirectory($fotoFolder, 0755, true);
        }

        // ==== HAPUS ====
        if ($request->has('hapus')) {
            $id = $request->input('id');
            $foto = $request->input('foto');
            
            if ($foto != '' && file_exists($fotoFolder . $foto)) {
                unlink($fotoFolder . $foto);
            }

            Pengurus::where('id', $id)->delete();
            return back()->with('success', 'Data berhasil dihapus');
        }

        // ==== TAMBAH & EDIT ====
        if ($request->has('simpan')) {
            $nama = $request->input('nama');
            $jabatan = $request->input('jabatan');
            $pendidikan = $request->input('pendidikan_terakhir');
            $foto = '';
            
            // Proses Upload Foto
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $namaFile = time() . '_' . $file->getClientOriginalName();
                $file->move($fotoFolder, $namaFile);
                $foto = $namaFile;
            }

            if ($request->filled('id')) {
                // Update
                $id = $request->input('id');
                if ($foto == '') {
                    $foto = $request->input('foto_lama');
                } else {
                    $fotoLama = $request->input('foto_lama');
                    if ($fotoLama != '' && file_exists($fotoFolder . $fotoLama)) {
                        unlink($fotoFolder . $fotoLama);
                    }
                }

                Pengurus::where('id', $id)->update([
                    'nama' => $nama,
                    'jabatan' => $jabatan,
                    'pendidikan_terakhir' => $pendidikan,
                    'foto' => $foto
                ]);
            } else {
                // Insert
                Pengurus::create([
                    'nama' => $nama,
                    'jabatan' => $jabatan,
                    'pendidikan_terakhir' => $pendidikan,
                    'foto' => $foto
                ]);
            }

            return back()->with('success', 'Data berhasil disimpan');
        }
        
        return back();
    }
}
