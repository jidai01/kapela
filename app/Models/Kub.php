<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kub extends Model
{
    use HasFactory;
    protected $table = 'kub';
    protected $primaryKey = 'id_kub';
    protected $fillable = [
        'id_wilayah',
        'nama_kub',
        'ketua_kub',
        'jumlah_anggota',
    ];
    public $timestamps = false;
    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'id_wilayah', 'id_wilayah');
    }

    public function umat()
    {
        return $this->hasMany(Umat::class, 'id_kub', 'id_kub');
    }

    public function kub()
    {
        return $this->belongsTo(KegiatanKub::class, 'id_kub', 'id_kub');
    }
}
