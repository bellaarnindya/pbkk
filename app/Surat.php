<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $primaryKey = 'id_surat';
    public $incrementing = false;

    protected $fillable = [
        'id_surat','id_jenis', 'nama_pemohon', 'nrp_pemohon', 'jabatan', 'angkatan_c', 'tanggal_waktu_mulai',
        'tanggal_waktu_mulai', 'tanggal_waktu_pelaksanaan', 'kegiatan', 'tempat_pelaksanaan', 'tempat_pinjam', 'tujuan',
        'nama_ketupel', 'nrp_ketupel', 'perihal', 'tanggal_sekarang'
    ];

}
