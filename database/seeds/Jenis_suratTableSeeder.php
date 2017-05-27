<?php

use Illuminate\Database\Seeder;

class Jenis_suratTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis = array("Surat Keterangan Aktif Berorganisasi", "Surat Keterangan Anggota C HMTC", "Surat Izin Keramaian", "Surat Peminjaman Alat Musik", "Surat Peminjaman Ruangan Dalam Jurusan", "Surat Peminjaman Ruangan Luar Jurusan");
        $tipe = array("A", "A", "A", "A", "A", "B");
        for($i=0; $i<6; $i++) {
            DB::table('jenis_surats')->insert([
                'id_jenis' => 'JS00'.($i+1),
                'jenis' => $jenis[$i],
                'tipe' => $tipe[$i]
            ]);
        }
    }
}
