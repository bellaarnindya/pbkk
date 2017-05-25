<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surats', function (Blueprint $table) {
            //$table->increments('id');
            $table->string('id_surat', 5);
            $table->primary('id_surat');
            $table->string('id_jenis', 5);
            $table->string('nama_pemohon')->nullable();
            $table->string ('nrp_pemohon', 10);
            $table->string('jabatan')->nullable();
            $table->string('angkatan_c')->nullable();
            $table->datetime('tanggal_waktu_mulai')->nullable();
            $table->datetime('tanggal_waktu_selesai')->nullable();
            $table->datetime('tanggal_waktu_pelaksanaan')->nullable();
            $table->string('kegiatan')->nullable();
            $table->string('tempat_pelaksanaan')->nullable();
            $table->string('tempat_pinjam')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('nama_ketupel')->nullable();
            $table->string('nrp_ketupel', 10)->nullable();
            $table->string('perihal')->nullable();
            $table->timestamp('tanggal_sekarang');
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
        Schema::dropIfExists('surats');
    }
}
