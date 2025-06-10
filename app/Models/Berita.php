<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    protected $table = 'berita';

    protected $primaryKey = 'id_berita';

    protected $fillable = [
        'judul_berita',
        'isi_berita',
        'slug',
        'foto',
        'tanggal_terbit',
    ];
    public $timestamps = false;
    /**
     * Boot method untuk membuat slug secara otomatis.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($berita) {
            $berita->slug = static::generateUniqueSlug($berita->judul_berita);
        });

        static::updating(function ($berita) {
            if ($berita->isDirty('judul_berita')) {
                $berita->slug = static::generateUniqueSlug(
                    $berita->judul_berita,
                    $berita->id_berita
                );
            }
        });
    }

    /**
     * Generate unique slug berdasarkan judul berita.
     */
    protected static function generateUniqueSlug($judul, $excludeId = null)
    {
        $slug = Str::slug($judul);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)
            ->when($excludeId, fn($query) => $query->where('id_berita', '!=', $excludeId))
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
}
