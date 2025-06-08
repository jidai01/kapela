<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenerimaanSakramen extends Model
{
    protected $table = 'penerimaan_sakramen';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_sakramen',
        'nik',
        'tanggal_penerimaan_sakramen',
    ];
    public $timestamps = false;
    public function sakramen()
    {
        return $this->belongsTo(Sakramen::class, 'id_sakramen', 'id_sakramen');
    }

    public function umat()
    {
        return $this->belongsTo(Umat::class, 'nik', 'nik');
    }
}
