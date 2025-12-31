<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    use HasFactory;

    protected $table = 'tentangs';

    protected $fillable = [
        'web_title',

        'about_title',
        'about_desc_1',
        'about_desc_2',

        'visi_desc_1',
        'visi_desc_2',

        'misi_desc_1',
        'misi_desc_2',
    ];
}
