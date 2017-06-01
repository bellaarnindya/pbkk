<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $primaryKey = 'id_inventaris';
    public $incrementing = false;

    protected $fillable = [
        'id_inventaris', 'nama_inventaris', 'tipe_inventaris'
    ];

     public function peminjaman(){
    	return $this->hasMany('App\Pemesanan', 'id_inventaris');
    }

}
