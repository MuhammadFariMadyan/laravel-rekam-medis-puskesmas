<?php

namespace App\Http\Controllers\Dokter;

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
    return view('dokter.dashboard.rekammedis.laporan_rekammedis',$data);
  } 

  public function showTambahRekamMedis()
  {
    $dataDokter= Dokter::select(DB::raw("kode_dktr"))
        ->orderBy(DB::raw("kode_dktr"))        
        ->get();
    $dataPasien= Pasien::select(DB::raw("kode_pasien"))
        ->orderBy(DB::raw("kode_pasien"))        
        ->get();
    return view('dokter.dashboard.rekammedis.tambahrekammedis')
                ->with('listdatapasein', $dataPasien)
                ->with('listdatadokter', $dataDokter);
  }

  public function index()
  {
    $dataRekamMedis= RekamMedis::select(DB::raw("no_redis, Anamnesia, pmrk_fisik, keluhan, diagnosa, therapy, rcn_tndk_lnjt, cat_kprawatan, layanan_lain, kode_pasien, kode_dktr, paraf_vld_dktr, created_at, updated_at"))
        ->orderBy(DB::raw("no_redis"))        
        ->get();
        
    $data = array('rekammedis' => $dataRekamMedis);   
    return view('dokter.dashboard.rekammedis.rekammedis',$data);
  }    

  public function hapus($no_redis)
  {
  
    $no_redis = RekamMedis::where('no_redis', '=', $no_redis)->first();

    if ($no_redis == null)
      app::abort(404);

    Session::flash('flash_message', 'Data Rekam Medis "'.$no_redis->no_redis.'" - "'.$no_redis->kode_pasien.'" Berhasil dihapus.');

    $no_redis->delete();

    return Redirect::action('Dokter\RekamMedisController@index');

  }

  protected function validator(array $data)
  {
        $messages = [
            'no_redis.required'       => 'Nomor Rekam Medis dibutuhkan.',
            'no_redis.unique'         => 'Nomor Rekam Medis sudah digunakan.',
            'Anamnesia.required'      => 'Anamnesia dibutuhkan.',
            'pmrk_fisik.required'     => 'Pemeriksaan Fisik dibutuhkan.',
            'keluhan.required'        => 'Keluhan dibutuhkan.',
            'diagnosa.required'       => 'Diagnosa dibutuhkan.',
            'therapy.required'        => 'Therapy dibutuhkan.',
            'rcn_tndk_lnjt.required'  => 'Rencana Tindak Lanjut dibutuhkan.',
            'cat_kprawatan.required'  => 'Catatan Keperawatan dibutuhkan.',
            'layanan_lain.required'   => 'Layanan Lain dibutuhkan.',
            'kode_pasien.required'    => 'Kode Pasien dibutuhkan.',      
            'kode_dktr.required'      => 'Kode Dokter dibutuhkan.',
            'paraf_vld_dktr.required' => 'Paraf/Validasi Dokter dibutuhkan.',          
        ];
    
        return Validator::make($data, [
            'no_redis'       => 'required|unique:rekammedis',            
            'Anamnesia'      => 'required',
            'pmrk_fisik'     => 'required',
            'keluhan'        => 'required',
            'diagnosa'       => 'required',
            'therapy'        => 'required',
            'rcn_tndk_lnjt'  => 'required',
            'cat_kprawatan'  => 'required',
            'layanan_lain'   => 'required',
            'kode_pasien'    => 'required',
            'kode_dktr'      => 'required',
            'paraf_vld_dktr' => 'required',            
        ], $messages);
  }
 
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data | Request $request | Opsional | dipakai keduanya bisa juga
     * @return User
     */
  protected function tambah(Request $request)
  {

        $input =$request->all();
        $pesan = array(
            'no_redis.required'       => 'Nomor Rekam Medis dibutuhkan.',
            'no_redis.unique'         => 'Nomor Rekam Medis sudah digunakan.',
            'Anamnesia.required'      => 'Anamnesia dibutuhkan.',
            'pmrk_fisik.required'     => 'Pemeriksaan Fisik dibutuhkan.',
            'keluhan.required'        => 'Keluhan dibutuhkan.',
            'diagnosa.required'       => 'Diagnosa dibutuhkan.',
            'therapy.required'        => 'Therapy dibutuhkan.',
            'rcn_tndk_lnjt.required'  => 'Rencana Tindak Lanjut dibutuhkan.',
            'cat_kprawatan.required'  => 'Catatan Keperawatan dibutuhkan.',
            'layanan_lain.required'   => 'Layanan Lain dibutuhkan.',
            'kode_pasien.required'    => 'Kode Pasien dibutuhkan.',      
            'kode_dktr.required'      => 'Kode Dokter dibutuhkan.',
            'paraf_vld_dktr.required' => 'Paraf/Validasi Dokter dibutuhkan.',          
        );

        $aturan = array(
            'no_redis'       => 'required|unique:tb_rekam_medis',            
            'Anamnesia'      => 'required',
            'pmrk_fisik'     => 'required',
            'keluhan'        => 'required',
            'diagnosa'       => 'required',
            'therapy'        => 'required',
            'rcn_tndk_lnjt'  => 'required',
            'cat_kprawatan'  => 'required',
            'layanan_lain'   => 'required',
            'kode_pasien'    => 'required',
            'kode_dktr'      => 'required',
            'paraf_vld_dktr' => 'required',           
        );
        
        $validator = Validator::make($input,$aturan, $pesan);

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();
        }
        # Bila validasi sukses
        $rekammedis = new RekamMedis;
        $rekammedis->no_redis       = $request['no_redis'];
        $rekammedis->Anamnesia      = $request['Anamnesia'];
        $rekammedis->pmrk_fisik     = $request['pmrk_fisik'];
        $rekammedis->keluhan        = $request['keluhan'];
        $rekammedis->diagnosa       = $request['diagnosa'];
        $rekammedis->therapy        = $request['therapy'];
        $rekammedis->rcn_tndk_lnjt  = $request['rcn_tndk_lnjt'];
        $rekammedis->cat_kprawatan  = $request['cat_kprawatan'];
        $rekammedis->layanan_lain   = $request['layanan_lain'];
        $rekammedis->kode_pasien    = $request['kode_pasien'];
        $rekammedis->kode_dktr      = $request['kode_dktr'];
        $rekammedis->paraf_vld_dktr = $request['paraf_vld_dktr'];        

        //melakukan save, jika gagal (return value false) lakukan harakiri
        //error kode 500 - internel server error
        if (! $rekammedis->save() )
          App::abort(500);

         Session::flash('flash_message', 'Data Rekam Medis "'.$request['no_redis'].'" - " '.$request['kode_pasien'].'" Berhasil disimpan.');

         return Redirect::action('Dokter\RekamMedisController@index');
  }  

 public function editrekammedis($no_redis)
    {
        $dataDokter= Dokter::select(DB::raw("kode_dktr"))
          ->orderBy(DB::raw("kode_dktr"))        
          ->get();
        $dataPasien= Pasien::select(DB::raw("kode_pasien"))
          ->orderBy(DB::raw("kode_pasien"))        
          ->get();

        $data = RekamMedis::find($no_redis);
        $rekammedis = RekamMedis::orderBy('no_redis')->get();

        return view('dokter.dashboard.rekammedis.editrekammedis',$data)
                ->with('listdatapasien', $dataPasien)
                ->with('listdatadokter', $dataDokter);
    }

 public function simpanedit($no_redis)
    {
        $input =Input::all();
        $messages = [
            'no_redis.required'       => 'Nomor Rekam Medis dibutuhkan.',
            'no_redis.unique'         => 'Nomor Rekam Medis sudah digunakan.',
            'Anamnesia.required'      => 'Anamnesia dibutuhkan.',
            'pmrk_fisik.required'     => 'Pemeriksaan Fisik dibutuhkan.',
            'keluhan.required'        => 'Keluhan dibutuhkan.',
            'diagnosa.required'       => 'Diagnosa dibutuhkan.',
            'therapy.required'        => 'Therapy dibutuhkan.',
            'rcn_tndk_lnjt.required'  => 'Rencana Tindak Lanjut dibutuhkan.',
            'cat_kprawatan.required'  => 'Catatan Keperawatan dibutuhkan.',
            'layanan_lain.required'   => 'Layanan Lain dibutuhkan.',
            'kode_pasien.required'    => 'Kode Pasien dibutuhkan.',      
            'kode_dktr.required'      => 'Kode Dokter dibutuhkan.',
            'paraf_vld_dktr.required' => 'Paraf/Validasi Dokter dibutuhkan.',              
        ];
        
        $validator = Validator::make($input, [
                          'no_redis'       => 'required',            
                          'Anamnesia'      => 'required',
                          'pmrk_fisik'     => 'required',
                          'keluhan'        => 'required',
                          'diagnosa'       => 'required',
                          'therapy'        => 'required',
                          'rcn_tndk_lnjt'  => 'required',
                          'cat_kprawatan'  => 'required',
                          'layanan_lain'   => 'required',
                          'kode_pasien'    => 'required',
                          'kode_dktr'      => 'required',
                          'paraf_vld_dktr' => 'required', 
                      ], $messages);
                     

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();
          # Bila validasi sukses
        }
        
        $editRekamMedis = RekamMedis::find($no_redis);
        $editRekamMedis->no_redis       = $input['no_redis']; //atau bisa Input::get('no_redis'); 
        $editRekamMedis->Anamnesia      = Input::get('Anamnesia');
        $editRekamMedis->pmrk_fisik     = $input['pmrk_fisik'];
        $editRekamMedis->keluhan        = $input['keluhan'];
        $editRekamMedis->diagnosa       = $input['diagnosa'];
        $editRekamMedis->therapy        = $input['therapy'];
        $editRekamMedis->rcn_tndk_lnjt  = $input['rcn_tndk_lnjt'];
        $editRekamMedis->cat_kprawatan  = $input['cat_kprawatan'];
        $editRekamMedis->layanan_lain   = $input['layanan_lain'];
        $editRekamMedis->kode_pasien    = $input['kode_pasien'];
        $editRekamMedis->kode_dktr      = $input['kode_dktr'];
        $editRekamMedis->paraf_vld_dktr = $input['paraf_vld_dktr'];

        if (! $editRekamMedis->save())
          App::abort(500);

        Session::flash('flash_message', 'Rekam Medis "'.$input['no_redis'].'" - " '.$input['kode_pasien'].'" Berhasil diubah.');

        return Redirect::action('Dokter\RekamMedisController@index'); 
    }

    protected function Cetak($no_redis, $kdPrint){  
      $dataLapRedis = DB::table('tb_rekam_medis')
                  ->join('tb_pasien','tb_rekam_medis.kode_pasien','=','tb_pasien.kode_pasien')
                  ->select('tb_rekam_medis.*', 'tb_pasien.nama_pasien', 'tb_pasien.tgl_lahir','tb_pasien.alamat')
                  ->where('tb_rekam_medis.no_redis','=', $no_redis)
                  ->get();
      // dd($dataLapRedis);
      $data = array('dataLapRedis' => $dataLapRedis);           
      $pdf = PDF::loadView('dokter.dashboard.rekammedis.cetakrekammedis',$data);      
      if($kdPrint==1)
        return $pdf->download('Data Rekam Medis Pasien.pdf');            
      else
        return $pdf->stream('Data Rekam Medis Pasien.pdf');       
   
  }

}

