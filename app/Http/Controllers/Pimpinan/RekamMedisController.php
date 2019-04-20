<?php

namespace App\Http\Controllers\Pimpinan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Response;
use DB;
use Auth;
use PDF;

use Validator;
use App\Http\Controllers\Controller;
use App\RekamMedis as RekamMedis;
use App\Pasien as Pasien;
use App\Dokter as Dokter;
use Session;

class RekamMedisController extends Controller
{
  
  public function __construct()
  {
    $this->middleware('auth');
  } 

  
  public function indexLapRedis()
  {
    $dataRekamMedis= RekamMedis::select(DB::raw("no_redis, Anamnesia, pmrk_fisik, keluhan, diagnosa, therapy, rcn_tndk_lnjt, cat_kprawatan, layanan_lain, kode_pasien, kode_dktr, paraf_vld_dktr, created_at, updated_at"))
        ->orderBy(DB::raw("no_redis"))        
        ->get();
        
    $data = array('rekammedis' => $dataRekamMedis);   
    return view('pimpinan.dashboard.rekammedis.laporan_rekammedis',$data);
  } 
 
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data | Request $request | Opsional | dipakai keduanya bisa juga
     * @return User
     */


    protected function CetakDateRange(Request $request, $kdPrint){
    
      $date['tgl_awal'] = $request->tgl_awal;
      $date['tgl_akhir'] = $request->tgl_akhir;

      $dataLapRedis = DB::table('tb_rekam_medis')
                  ->join('tb_pasien','tb_rekam_medis.kode_pasien','=','tb_pasien.kode_pasien')
                  ->select('tb_rekam_medis.*', 'tb_pasien.nama_pasien', 'tb_pasien.tgl_lahir')
                  ->whereBetween('tb_rekam_medis.created_at', [$date['tgl_awal'], $date['tgl_akhir']])
                  ->get();
           
      $data = array('dataLapRedis' => $dataLapRedis,                    
                    'dateAwal' => $date['tgl_awal'],
                    'dateAkhir' => $date['tgl_akhir']); 
      
      $pdf = PDF::loadView('pimpinan.dashboard.rekammedis.cetaklaporanrekammedis', $data); 
      if($kdPrint==1)
        return $pdf->download('Nilai.pdf');            
      else
        return $pdf->stream('Nilai.pdf');    
   
  }

}

