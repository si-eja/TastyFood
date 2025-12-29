<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $fillable = [
        'subject',
        'name',
        'email',
        'message',
        'is_read',
    ];
}
