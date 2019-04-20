<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rujuk extends Model
{
    protected $table = 'tb_rujuk';
    protected $primaryKey = 'no_surat_rujukan'; // harus di definisikan karena primary key nya bukan id 
    public $incrementing = false; // biar gak 0 jika mendefinisikan primary key // link https://stackoverflow.com/questions/34458985/eloquent-model-returns-0-as-primary-key

    public function rekammedis(){
    	return $this->belongsTo('App\RekamMedis');
    }
}
