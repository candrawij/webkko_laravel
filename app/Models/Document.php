<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'document';

    protected $fillable = [
        'title',
        'content',
        'author_id',
    ];

    // Define relationships, accessors, mutators, etc. as needed
}
