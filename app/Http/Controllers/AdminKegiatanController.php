<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\File;

class AdminKegiatanController extends Controller
{
    public function action(Request $request)
    {
        $fotoFolder = public_path('assets/foto_kegiatan/');
        $materiFolder = public_path('assets/materi_kegiatan/');
        
        if (!File::exists($fotoFolder)) File::makeDirectory($fotoFolder, 0755, true);
        if (!File::exists($materiFolder)) File::makeDirectory($materiFolder, 0755, true);

        // ==== HAPUS MATERI SPESIFIK ====
        if ($request->has('hapus_materi_id')) {
            $id = $request->query('hapus_materi_id');
            $file = $request->query('file');
            
            if ($file && file_exists($materiFolder . $file)) {
                unlink($materiFolder . $file);
            }
            
            $kegiatan = Kegiatan::find($id);
            if ($kegiatan) {
                $kegiatan->update(['materi' => null]);
                $kegiatan->save();
            }

            return back()->with('success', 'File materi berhasil dihapus');
        }

        // ==== HAPUS FOTO SPESIFIK ====
        if ($request->has('hapus_foto_id')) {
            $id = $request->query('hapus_foto_id');
            $fotoToDel = $request->query('foto');
            
            $kegiatan = Kegiatan::find($id);
            if ($kegiatan && $kegiatan->foto) {
                if ($fotoToDel && file_exists($fotoFolder . $fotoToDel)) {
                    unlink($fotoFolder . $fotoToDel);
                }
                
                $fotoList = explode(',', $kegiatan->foto);
                $fotoList = array_diff($fotoList, [$fotoToDel]);
                $fotoList = array_filter($fotoList);
                
                $kegiatan->update(['foto' => implode(',', $fotoList)]);
            }
            return back()->with('success', 'Foto berhasil dihapus');
        }

        // ==== HAPUS KEGIATAN ====
        if ($request->isMethod('post') && $request->has('hapus')) {
            $id = $request->input('id');
            $kegiatan = Kegiatan::find($id);
            
            if ($kegiatan) {
                if ($kegiatan->foto) {
                    $fotoList = explode(',', $kegiatan->foto);
                    foreach ($fotoList as $f) {
                        if ($f && file_exists($fotoFolder . $f)) {
                            unlink($fotoFolder . $f);
                        }
                    }
                }
                
                if ($kegiatan->materi && file_exists($materiFolder . $kegiatan->materi)) {
                    unlink($materiFolder . $kegiatan->materi);
                }
                
                $kegiatan->delete();
            }
            return back()->with('success', 'Data berhasil dihapus');
        }

        // ==== TAMBAH & EDIT ====
        if ($request->isMethod('post') && $request->has('simpan')) {
            $nama_kegiatan = $request->input('nama_kegiatan');
            $tanggal = $request->input('tanggal');
            $jam = $request->input('jam');
            $tempat = $request->input('tempat');
            $deskripsi = $request->input('deskripsi');
            
            $uploadedFiles = [];
            $materi = '';

            // Upload Foto Baru (Multiple)
            if ($request->hasFile('foto')) {
                foreach ($request->file('foto') as $file) {
                    if ($file->isValid()) {
                        $newName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $file->move($fotoFolder, $newName);
                        $uploadedFiles[] = $newName;
                    }
                }
            }

            // Upload Materi
            if ($request->hasFile('materi')) {
                $fileMateri = $request->file('materi');
                if ($fileMateri->isValid()) {
                    $materiExt = strtolower($fileMateri->getClientOriginalExtension());
                    $allowedMateri = ['pdf', 'doc', 'docx', 'ppt', 'pptx'];
                    
                    if (in_array($materiExt, $allowedMateri)) {
                        $materiNewName = time() . '_' . uniqid() . '.' . $materiExt;
                        $fileMateri->move($materiFolder, $materiNewName);
                        $materi = $materiNewName;
                    }
                }
            }

            if ($request->filled('id')) {
                // EDIT
                $id = $request->input('id');
                $kegiatan = Kegiatan::find($id);
                
                $fotoList = [];
                if ($request->filled('foto_lama')) {
                    $fotoList = explode(',', $request->input('foto_lama'));
                }
                
                if (!empty($uploadedFiles)) {
                    $fotoList = array_merge($fotoList, $uploadedFiles);
                }
                $fotoList = array_filter($fotoList);
                $fotoStr = implode(',', $fotoList);
                
                if (empty($materi)) {
                    $materi = $request->input('materi_lama');
                }
                
                $kegiatan = Kegiatan::find($id);
                if ($kegiatan) {
                    $kegiatan->nama_kegiatan = $nama_kegiatan;
                    $kegiatan->tanggal = $tanggal;
                    $kegiatan->jam = $jam;
                    $kegiatan->tempat = $tempat;
                    $kegiatan->deskripsi = $deskripsi;
                    $kegiatan->foto = $fotoStr;
                    $kegiatan->materi = $materi;

                    $kegiatan->save();
                }

            } else {
                // TAMBAH BARU
                Kegiatan::create([
                    'nama_kegiatan' => $nama_kegiatan,
                    'tanggal' => $tanggal,
                    'jam' => $jam,
                    'tempat' => $tempat,
                    'deskripsi' => $deskripsi,
                    'foto' => implode(',', $uploadedFiles),
                    'materi' => $materi
                ]);
            }

            return back()->with('success', 'Data berhasil disimpan');
        }

        return back();
    }
}
