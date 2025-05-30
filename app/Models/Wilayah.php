<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wilayah extends Model
{
    protected $table = 'wilayah';
    protected $primaryKey = 'id_wilayah';
    protected $fillable = [
        'nama_wilayah',
        'ketua_wilayah',
        'jumlah_anggota',
    ];
    public $timestamps = false;

    // function buku() : HasMany {
    //     return $this->hasMany(Buku::class, 'id_pengarang', 'id_pengarang');
    // }
}
