<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sakramen extends Model
{
    protected $table = 'sakramen';
    protected $primaryKey = 'id_sakramen';
    protected $fillable = [
        'nama_sakramen',
    ];
    public $timestamps = false;
}
