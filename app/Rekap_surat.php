<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekap_surat extends Model
{
    protected $primaryKey = 'id_rekap';
    public $incrementing = false;

    protected $fillable = [
        'id_rekap','id_surat', 'nomor_surat'
    ];

}
