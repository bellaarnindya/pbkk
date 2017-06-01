<?php

use Illuminate\Database\Seeder;

class InventarisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inventaris = array("Papan Karambol", "Bendera Himpunan 1 x 1.5", "Bendera Himpunan 3 x 4", "Foto Presiden", "Foto Wakil Presiden", "Foto Garuda", "Tiang Bendera", "Proyektor", "Papan Tulis", "Dispenser");
        $jumlah = array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1);
        for($i=0; $i<10;$i++) {
            if (($i+1)<10) $str="IN00";
            else $str="IN0";
            DB::table('inventaris')->insert([
                'id_inventaris' => $str.($i+1),
                'nama_inventaris' => $inventaris[$i],
                'jumlah_barang' => $jumlah[$i]
            ]);
        }
    }
}
