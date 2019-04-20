<?php

namespace App\Http\Controllers\Teknisi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Response;
use DB;
use PDF;

use Validator;
use App\Http\Controllers\Controller;
use App\Resep as Resep;
use App\RekamMedis as RekamMedis;
use Session;


class ResepController extends Controller
{
  
  public function __construct()
  {
    $this->middleware('auth');
  }
  
  public function showTambahResep()
  {
    $dataResep= RekamMedis::select(DB::raw("no_redis"))
        ->orderBy(DB::raw("no_redis"))        
        ->get();

    return view('teknisi.dashboard.resep.tambahresep')
            ->with('listresep', $dataResep);
  }

  public function index()
  { 
    $dataResep= Resep::select(DB::raw("no_resep, resep, tgl_resep, no_redis"))
        ->orderBy(DB::raw("no_resep"))        
        ->get();
        
    $data = array('resep' => $dataResep);   
    return view('teknisi.dashboard.resep.resep',$data);
  }    

  public function hapus($no_resep)
  {
  
    $no_resep = Resep::where('no_resep', '=', $no_resep)->first();

    if ($no_resep == null)
      app::abort(404);

    Session::flash('flash_message', 'Data Resep "'.$no_resep->no_resep.'" - "'.$no_resep->no_redis.'" Berhasil dihapus.');

    $no_resep->delete();

    return Redirect::action('Teknisi\ResepController@index');

  }

  protected function validator(array $data)
  {
        $messages = [
            'no_resep.required' => 'Nomor Resep dibutuhkan.',
            'no_resep.unique'   => 'Nomor Resep sudah digunakan.',
            'resep.required'    => 'Resep dibutuhkan.',
            'tgl_resep.required'=> 'Tanggal Resep dibutuhkan.',
            'no_redis.required' => 'Nomor Rekam Medis dibutuhkan.',          
        ];
    
        return Validator::make($data, [
            'no_resep'  => 'required|unique:tb_resep',            
            'resep'     => 'required',
            'tgl_resep' => 'required',
            'no_redis'  => 'required',            
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
            'no_resep.required' => 'Nomor Resep dibutuhkan.',
            'no_resep.unique'   => 'Nomor Resep sudah digunakan.',
            'resep.required'    => 'Resep dibutuhkan.',
            'tgl_resep.required'=> 'Tanggal Resep dibutuhkan.',
            'no_redis.required' => 'Nomor Rekam Medis dibutuhkan.',         
        );

        $aturan = array(
            'no_resep'  => 'required|unique:tb_resep',            
            'resep'     => 'required',
            'tgl_resep' => 'required',
            'no_redis'  => 'required',            
        );
        

        $validator = Validator::make($input,$aturan, $pesan);

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();
        }
        # Bila validasi sukses

        $resep = new Resep;
        $resep->no_resep    = $request['no_resep'];
        $resep->resep       = $request['resep'];
        $resep->tgl_resep   = $request['tgl_resep'];
        $resep->no_redis    = $request['no_redis'];

        //melakukan save, jika gagal (return value false) lakukan harakiri
        //error kode 500 - internel server error
        if (! $resep->save() )
          App::abort(500);

        Session::flash('flash_message', 'Data Resep "'.$request['no_resep'].'" - " '.$request['no_redis'].'" Berhasil disimpan.');

        return Redirect::action('Teknisi\ResepController@index'); 
  }
 
  public function tambahresep(Request $request)
  {
        $validator = $this->validator($request->all());
 
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
           
        }
 
        $this->tambah($request->all());
 
        return response()->json($request->all(),200);
       
    }    

 public function editresep($no_resep)
    {
        $dataRujuk= RekamMedis::select(DB::raw("no_redis"))
        ->orderBy(DB::raw("no_redis"))        
        ->get();
        $data = Resep::find($no_resep);
        $resep = Resep::orderBy('no_resep')->get();

        return view('teknisi.dashboard.resep.editresep',$data)
                ->with('listresep', $dataRujuk);
    }

 public function simpanedit($no_resep)
    {
        $input =Input::all();
        $messages = [
            'no_resep.required' => 'Nomor Resep dibutuhkan.',
            'no_resep.unique'   => 'Nomor Resep sudah digunakan.',
            'resep.required'    => 'Resep dibutuhkan.',
            'tgl_resep.required'=> 'Tanggal Resep dibutuhkan.',
            'no_redis.required' => 'Nomor Rekam Medis dibutuhkan.',           
        ];
        

        $validator = Validator::make($input, [
                          'no_resep'  => 'required',            
                          'resep'     => 'required',
                          'tgl_resep' => 'required',
                          'no_redis'  => 'required',
                      ], $messages);
                     

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();
          # Bila validasi sukses
        }
        
        $editResep = Resep::find($no_resep);
        $editResep->no_resep   = $input['no_resep']; //atau bisa Input::get('no_resep'); 
        $editResep->resep      = Input::get('resep'); 
        $editResep->tgl_resep  = $input['tgl_resep'];
        $editResep->no_redis   = $input['no_redis'];

        if (! $editResep->save())
          App::abort(500);

        Session::flash('flash_message', 'Data Resep "'.$input['no_resep'].'" - " '.$input['no_redis'].'" Berhasil diubah.');
        return Redirect::action('Teknisi\ResepController@index'); 
        
    }

    protected function Cetak($no_resep, $kdPrint){  
      $dataResepPasien = DB::table('tb_resep')
                  ->join('tb_rekam_medis','tb_resep.no_redis','=','tb_rekam_medis.no_redis')
                  ->leftjoin('tb_pasien','tb_rekam_medis.kode_pasien','=','tb_pasien.kode_pasien')
                  ->select('tb_resep.no_resep','tb_rekam_medis.no_redis', 'tb_pasien.kode_pasien', 'tb_pasien.nama_pasien', 'tb_resep.resep','tb_rekam_medis.cat_kprawatan')
                  ->where('tb_resep.no_resep','=', $no_resep)
                  ->get();
      // dd($dataResepPasien);
      $data = array('dataResepPasien' => $dataResepPasien);           
      $pdf = PDF::loadView('teknisi.dashboard.resep.cetakresep',$data);      
      if($kdPrint==1)
        return $pdf->download('Data Resep Pasien.pdf');            
      else
        return $pdf->stream('Data Resep Pasien.pdf');       
   
  }

}

