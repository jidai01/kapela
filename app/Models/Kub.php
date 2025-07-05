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

    public function kegiatankub()
    {
        return $this->belongsTo(KegiatanKub::class, 'id_kub', 'id_kub');
    }

    public function updateJumlahAnggota()
    {
        $umatList = $this->umat()->get();
        $jumlah = $umatList->count();

        if ($jumlah === 0) {
            $this->ketua_kub = '-';
        } elseif ($jumlah === 1) {
            $this->ketua_kub = $umatList->first()->nama_lengkap;
        } else {
            $isStillExist = $umatList->contains('nama_lengkap', $this->ketua_kub);
            if (!$isStillExist) {
                $this->ketua_kub = '-';
            }
        }

        $this->jumlah_anggota = $jumlah;
        $this->save();
    }
}
