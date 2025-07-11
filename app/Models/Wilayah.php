<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wilayah extends Model
{
    use HasFactory;
    protected $table = 'wilayah';
    protected $primaryKey = 'id_wilayah';
    protected $fillable = [
        'nama_wilayah',
        'ketua_wilayah',
        'jumlah_anggota',
    ];
    public $timestamps = false;
    function kub(): HasMany
    {
        return $this->hasMany(Kub::class, 'id_wilayah', 'id_wilayah');
    }

    public function umat()
    {
        return $this->hasMany(Umat::class, 'id_wilayah', 'id_wilayah');
    }

    public function kegiatanwilayah(): HasMany
    {
        return $this->hasMany(KegiatanWilayah::class, 'id_wilayah', 'id_wilayah');
    }

    public function updateJumlahAnggota()
    {
        $umatList = $this->umat()->get();
        $jumlah = $umatList->count();
        $this->jumlah_anggota = $jumlah;
        $this->save();
    }
}
