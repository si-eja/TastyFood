<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = [
        'page_title',
        'image',
        'caption',
        'type',
        'order',
        'is_active',
    ];
}
