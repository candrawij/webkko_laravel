<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';

    protected $fillable = [
        'nama_event',
        'slug',
        'deskripsi',
        'tanggal_event',
        'lokasi',
    ];
}
