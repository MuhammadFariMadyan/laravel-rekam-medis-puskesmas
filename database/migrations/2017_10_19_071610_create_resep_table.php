<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_resep', function (Blueprint $table) {
            $table->string('no_resep', 15);
            $table->string('resep', 50);
            $table->date('tgl_resep'); 
            // relasi foreign key
            $table->string('no_redis', 15)
                -> references('no_redis')
                -> on('tb_rekam_medis')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
            
            $table->primary('no_resep');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tb_resep');
    }
}
