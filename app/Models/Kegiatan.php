<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';

    protected $fillable = [
        'nama_kegiatan',
        'tanggal',
        'waktu',
        'lokasi',
        'deskripsi',
        'foto',
        'materi',
    ];

    protected static function booted()
    {
        $clearKegiatanCache = function ($kegiatan) {
            Cache::forget('semua_kegiatan');
            Cache::forget("kegiatan_{$kegiatan->id}");
            Cache::forget('kegiatan_terbaru');
        };

        static::created($clearKegiatanCache);
        static::updated($clearKegiatanCache);
        static::deleted($clearKegiatanCache);
    }
}
