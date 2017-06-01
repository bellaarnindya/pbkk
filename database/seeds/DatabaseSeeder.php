<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Jenis_suratTableSeeder::class);
        //$this->call(InventarisTableSeeder::class);
    }
}
