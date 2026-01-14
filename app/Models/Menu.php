<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $fillable = [
        'nama_menu',
        'subjudul',
        'deskripsi',
        'gambar',
        'slug',
    ];

    public function rates()
    {
        return $this->hasMany(MenuRate::class);
    }
}
