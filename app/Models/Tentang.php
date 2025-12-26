<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    protected $fillable = [
        'web_title',

        'about_title',
        'about_desc_1',
        'about_desc_2',
        'about_image_1',
        'about_image_2',

        'visi_desc_1',
        'visi_desc_2',
        'visi_image_1',
        'visi_image_2',

        'misi_desc_1',
        'misi_desc_2',
        'misi_image',
    ];
}
