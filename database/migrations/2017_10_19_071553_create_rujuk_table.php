<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRujukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_rujuk', function (Blueprint $table) {
            $table->string('no_surat_rujukan', 15);            
            $table->date('tgl_rujuk');            
            // relasi foreign key            
            $table->string('no_redis', 15)
                -> references('no_redis')
                -> on('tb_rekam_medis')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps(); 

            $table->primary('no_surat_rujukan');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tb_rujuk');
    }
}
