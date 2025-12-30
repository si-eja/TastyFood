<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
   protected $fillable = [
    'section',
    'title',
    'image',
    'caption',
    'order',
    'is_active'
];

}
