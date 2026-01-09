<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuRate extends Model
{
    //
    protected $fillable = [
        'menu_id',
        'tanggal',
        'komentar',
    ];
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
