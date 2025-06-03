<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umat extends Model
{
    protected $table = 'umat';
    protected $primaryKey = 'nik';

    protected $fillable = [
        'id_kub',
        'id_wilayah',
        'nama_lengkap',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'nomor_telepon',
        'pekerjaan',
        'status_baptis',
        'status_komuni',
        'status_krisma',
        'status_nikah',
    ];
    public $timestamps = false;

    public function kub()
    {
        return $this->belongsTo(Kub::class, 'id_kub', 'id_kub');
    }

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'id_wilayah', 'id_wilayah');
    }
}
