<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KegiatanWilayah extends Model
{
    use HasFactory;
    protected $table = 'kegiatan_wilayah';

    protected $primaryKey = 'id_kegiatan_wilayah';

    protected $fillable = [
        'id_wilayah',
        'nama_kegiatan_wilayah',
        'deskripsi',
        'tanggal_kegiatan',
    ];
    public $timestamps = false;
    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'id_wilayah', 'id_wilayah');
    }
}
