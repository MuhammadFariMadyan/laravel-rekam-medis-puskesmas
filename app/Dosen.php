<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Dosen extends Model
{

	protected $table = "dosen";
	public $timestamps = false;
	protected $primaryKey = 'dsnNidn';

	public function Prodi(){
		return $this->hasMany('App\Prodi', 'foreign_key', 'prodiKodeJurusan');
	}
}
