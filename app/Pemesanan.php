<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $primaryKey = 'no_book';
    public $incrementing = false;

    protected $fillable = [
        'no_book','id_surat', 'id_inventaris', 'nama_pemesan', 'nrp_pemesan', 'status'
    ];

}
