<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRekamMedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_rekam_medis', function (Blueprint $table) {
            $table->string('no_redis', 15);                        
            $table->string('Anamnesia', 50);                        
            $table->string('pmrk_fisik', 50);                        
            $table->string('keluhan', 50);
            $table->string('diagnosa', 50);
            $table->string('therapy', 50);
            $table->string('rcn_tndk_lnjt', 50);            
            $table->string('cat_kprawatan', 55);
            $table->string('layanan_lain', 50);
            
            // relasi foreign key
            $table->string('kode_pasien', 15)
                -> references('kode_pasien')
                -> on('tb_pasien')  
                ->onDelete('cascade')
                ->onUpdate('cascade'); 
            $table->string('kode_dktr', 30)
                -> references('kode_dktr')
                -> on('tb_dokter')  
                ->onDelete('cascade')
                ->onUpdate('cascade'); 
            $table->string('paraf_vld_dktr', 30);
            $table->timestamps(); 

            $table->primary('no_redis');                                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tb_rekam_medis');
    }
}
