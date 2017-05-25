<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis_surat extends Model
{
    protected $primaryKey = 'id_jenis';
    public $incrementing = false;

    protected $fillable = [
        'id_jenis','jenis','tipe'
    ];

}
