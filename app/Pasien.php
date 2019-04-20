<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = "tb_pasien";
    //public $timestamps = true;
    protected $primaryKey = 'kode_pasien'; // harus di definisikan karena primary key nya bukan id 
    public $incrementing = false; // biar gak 0 jika mendefinisikan primary key // link https://stackoverflow.com/questions/34458985/eloquent-model-returns-0-as-primary-key
    protected $fillable = array('kode_pasien', 'nama_pasien', 'alamat', 'rt', 'rw', 'tgl_lahir', 'agama', 'Jen_pmbyrn', 'no_jaminan', 'pekerjaan', 'pend_trkhr', 'telp', 'ortu_suami', 'istri_anak', 'alergi_obat');

}
