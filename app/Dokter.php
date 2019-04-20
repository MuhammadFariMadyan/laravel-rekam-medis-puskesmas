<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'tb_dokter';
    protected $primaryKey = 'kode_dktr'; // harus di definisikan karena primary key nya bukan id 
    public $incrementing = false; // biar gak 0 jika mendefinisikan primary key // link https://stackoverflow.com/questions/34458985/eloquent-model-returns-0-as-primary-key
}
