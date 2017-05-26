<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            //$table->increments('id');
            $table->string('no_book', 7);
            $table->primary('no_book');
            $table->string('id_surat', 5)->nullable();
            $table->string('id_inventaris', 5)->nullable();
            $table->string('nama_pemesan');
            $table->string('nrp_pemesan');
            $table->integer('status')->default(0);
            $table->timestamp('tanggal_pemesanan');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanans');
    }
}
