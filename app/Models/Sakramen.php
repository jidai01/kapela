<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sakramen extends Model
{
    protected $table = 'sakramen';
    protected $primaryKey = 'id_sakramen';
    protected $fillable = [
        'nama_sakramen',
    ];
    public $timestamps = false;
    function penerimaansakramen() : HasMany {
        return $this->hasMany(PenerimaanSakramen::class, 'id_sakramen', 'id_sakramen');
    }
}
