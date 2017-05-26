<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surats', function ($table) {
            $table->foreign('id_jenis')
                ->references('id_jenis')
                ->on('jenis_surats')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('rekap_surats', function($table) {
            $table->foreign('id_surat')
                ->references('id_surat')
                ->on('surats')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('pemesanans', function($table) {
            $table->foreign('id_surat')
                ->references('id_surat')
                ->on('surats')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('id_inventaris')
                ->references('id_inventaris')
                ->on('inventaris')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
