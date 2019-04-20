<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_dokter', function (Blueprint $table) {
            $table->string('kode_dktr', 15);             
            $table->string('nama_dktr', 50);             
            $table->string('alamat_dktr', 100);            
            $table->date('tgl_lahir_dktr');
            $table->string('agama_dktr', 10);                                               
            $table->string('pend_trkhr_dktr', 20);
            $table->string('telp_dktr', 15);
            $table->timestamps(); 

            $table->primary('kode_dktr'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tb_dokter');
    }
}
