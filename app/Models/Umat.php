<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Umat extends Model
{
    use HasFactory;
    protected $table = 'umat';
    protected $primaryKey = 'nik';
    public $incrementing = false;
    protected $fillable = [
        'nik',
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

    function penerimaansakramen() : HasMany {
        return $this->hasMany(PenerimaanSakramen::class, 'nik', 'nik');
    }
}
