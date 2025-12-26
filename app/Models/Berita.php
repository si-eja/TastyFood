<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'page_title',
        'judul',
        'slug',
        'deskripsi_1',
        'deskripsi_2',
        'thumbnail',
        'is_active',
    ];
}
