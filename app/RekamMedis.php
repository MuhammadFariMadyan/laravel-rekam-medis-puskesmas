<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{

	protected $table = 'tb_rekam_medis';
	protected $primaryKey = 'no_redis'; // harus di definisikan karena primary key nya bukan id 
    public $incrementing = false; // biar gak 0 jika mendefinisikan primary key // link https://stackoverflow.com/questions/34458985/eloquent-model-returns-0-as-primary-key

    public function pasien()
    {
    	return $this->belongsTo('App\Pasien');
    }

    public function dokter(){
    	return $this->belongsTo('App\Dokter');
    } 
}
