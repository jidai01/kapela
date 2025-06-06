<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';

    protected $primaryKey = 'id_pengumuman';

    protected $fillable = [
        'judul_pengumuman',
        'isi_pengumuman',
        'slug',
        'tanggal_terbit',
    ];

    /**
     * Boot method untuk membuat slug secara otomatis.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pengumuman) {
            $pengumuman->slug = static::generateUniqueSlug($pengumuman->judul_pengumuman);
        });

        static::updating(function ($pengumuman) {
            if ($pengumuman->isDirty('judul_pengumuman')) {
                $pengumuman->slug = static::generateUniqueSlug(
                    $pengumuman->judul_pengumuman,
                    $pengumuman->id_pengumuman
                );
            }
        });
    }

    /**
     * Generate unique slug berdasarkan judul pengumuman.
     */
    protected static function generateUniqueSlug($judul, $excludeId = null)
    {
        $slug = Str::slug($judul);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)
            ->when($excludeId, fn($query) => $query->where('id_pengumuman', '!=', $excludeId))
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
}
