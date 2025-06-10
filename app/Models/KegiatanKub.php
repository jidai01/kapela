<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KegiatanKub extends Model
{
    use HasFactory;
    protected $table = 'kegiatan_kub';

    protected $primaryKey = 'id_kegiatan_kub';

    protected $fillable = [
        'id_kub',
        'nama_kegiatan_kub',
        'deskripsi',
        'tanggal_kegiatan',
    ];
    public $timestamps = false;
    public function kub()
    {
        return $this->belongsTo(Kub::class, 'id_kub', 'id_kub');
    }
}
