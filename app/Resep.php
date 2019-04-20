<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $table = 'tb_resep';
    protected $primaryKey = 'no_resep'; // harus di definisikan karena primary key nya bukan id 
    public $incrementing = false; // biar gak 0 jika mendefinisikan primary key // link https://stackoverflow.com/questions/34458985/eloquent-model-returns-0-as-primary-key

    public function rekammedis(){
    	return $this->belongsTo('App\RekamMedis');
    }
}
