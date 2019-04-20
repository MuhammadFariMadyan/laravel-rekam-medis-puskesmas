<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pasien', function (Blueprint $table) {
            $table->string('kode_pasien', 15);             
            $table->string('nama_pasien', 50);             
            $table->string('alamat', 100);
            $table->string('rt', 2);
            $table->string('rw', 2);
            $table->date('tgl_lahir');
            $table->string('agama', 10);                        
            $table->string('Jen_pmbyrn', 15);
            $table->string('no_jaminan', 20);
            $table->string('pekerjaan', 20);
            $table->string('pend_trkhr', 20);
            $table->string('telp', 15);
            $table->string('ortu_suami', 25);
            $table->string('istri_anak', 25);
            $table->string('alergi_obat', 30);
            $table->timestamps(); 

            $table->primary('kode_pasien'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tb_pasien');
    }
}
