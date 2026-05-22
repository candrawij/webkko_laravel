<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BukuTamu extends Model
{
    protected $table = 'buku_tamu';
    protected $fillable = ['event_id', 'nama', 'instansi', 'kecamatan', 'no_hp', 'foto', 'checkin_at'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
