<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;

class AdminPendaftarController extends Controller
{
    public function action(Request $request)
    {
        // ==== UPDATE STATUS ====
        if ($request->has('update_id') && $request->has('status')) {
            $id = $request->query('update_id');
            $status = $request->query('status');

            Pendaftar::where('id', $id)->update(['status' => $status]);
            return back()->with('success', 'Status pendaftar berhasil diperbarui');
        }

        // ==== HAPUS ====
        if ($request->isMethod('post') && $request->has('hapus')) {
            $id = $request->input('id');
            Pendaftar::where('id', $id)->delete();

            return back()->with('success', 'Data pendaftar berhasil dihapus');
        }

        return back();
    }
}
