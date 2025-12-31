<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'beritas';

    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'tanggal',
    ];

    /**
     * Auto-generate slug yang UNIK
     */
    protected static function booted()
    {
        static::creating(function ($berita) {
            $berita->slug = self::generateUniqueSlug($berita->judul);
        });

        static::updating(function ($berita) {
            if ($berita->isDirty('judul')) {
                $berita->slug = self::generateUniqueSlug($berita->judul, $berita->id);
            }
        });
    }

    /**
     * Generate slug unik (anti duplicate)
     */
    protected static function generateUniqueSlug($judul, $ignoreId = null)
    {
        $slug = Str::slug($judul);
        $originalSlug = $slug;
        $count = 1;

        while (
            self::where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
}
