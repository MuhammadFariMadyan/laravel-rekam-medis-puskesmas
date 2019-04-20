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
use App\Rujuk as Rujuk;
use App\RekamMedis as RekamMedis;
use Session;

class RujukController extends Controller
{
  
  public function __construct()
  {
    $this->middleware('auth');
  }

public function showTambahRujuk()
  {
    $dataRujuk= RekamMedis::select(DB::raw("no_redis"))
        ->orderBy(DB::raw("no_redis"))        
        ->get();
    return view('teknisi.dashboard.rujuk.tambahrujuk')    
              ->with('listrujuk', $dataRujuk);
  }

  public function index()
  {  
    $dataRujuk = Rujuk::select(DB::raw("no_surat_rujukan, tgl_rujuk, no_redis"))
        ->orderBy(DB::raw("no_surat_rujukan"))        
        ->get();
        
    $data = array('rujuk' => $dataRujuk);   

    return view('teknisi.dashboard.rujuk.rujuk',$data);    
  }    

  public function hapus($no_surat_rujukan)
  {
  
    $no_surat_rujukan = Rujuk::where('no_surat_rujukan', '=', $no_surat_rujukan)->first();

    if ($no_surat_rujukan == null)
      app::abort(404);

    Session::flash('flash_message', 'Data Rujuk "'.$no_surat_rujukan->no_surat_rujukan.'" - "'.$no_surat_rujukan->no_redis.'" Berhasil dihapus.');

    $no_surat_rujukan->delete();

    return Redirect::action('Teknisi\RujukController@index');

  }

  protected function validator(array $data)
  {
        $messages = [
            'no_surat_rujukan.required' => 'Nomor Surat Rujuk dibutuhkan.',
            'no_surat_rujukan.unique'   => 'Nomor Surat Rujuk sudah digunakan.',
            'tgl_rujuk.required'    => 'Tanggal Rujuk dibutuhkan.',
            'no_redis.required' => 'Nomor Rekam Medis dibutuhkan.',          
        ];
    
        return Validator::make($data, [
            'no_surat_rujukan'  => 'required|unique:tb_rujuk',            
            'tgl_rujuk'     => 'required',
            'no_redis' => 'required',            
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
            'no_surat_rujukan.required' => 'Nomor Surat Rujuk dibutuhkan.',
            'no_surat_rujukan.unique'   => 'Nomor Surat Rujuk sudah digunakan.',
            'tgl_rujuk.required'    => 'Tanggal Rujuk dibutuhkan.',
            'no_redis.required' => 'Nomor Rekam Medis dibutuhkan.',           
        );

        $aturan = array(
            'no_surat_rujukan'  => 'required|unique:tb_rujuk',            
            'tgl_rujuk'     => 'required',
            'no_redis' => 'required',            
        );
        

        $validator = Validator::make($input,$aturan, $pesan);

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();
        }
        # Bila validasi sukses
        $rujuk = new Rujuk;
        $rujuk->no_surat_rujukan    = $request['no_surat_rujukan'];
        $rujuk->tgl_rujuk       = $request['tgl_rujuk'];
        $rujuk->no_redis   = $request['no_redis'];

        //melakukan save, jika gagal (return value false) lakukan harakiri
        //error kode 500 - internel server error
        if (! $rujuk->save() )
          App::abort(500);

        Session::flash('flash_message', 'Data Rujuk "'.$request['no_surat_rujukan'].'" - " '.$request['no_redis'].'" Berhasil disimpan.');
        return Redirect::action('Teknisi\RujukController@index');
  }
 
  public function tambahrujuk(Request $request)
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

 public function editrujuk($no_surat_rujukan)
    {
        $dataRujuk= RekamMedis::select(DB::raw("no_redis"))
        ->orderBy(DB::raw("no_redis"))        
        ->get();
        $data = Rujuk::find($no_surat_rujukan);
        $rujuk = Rujuk::orderBy('no_surat_rujukan')->get();

        return view('teknisi.dashboard.rujuk.editrujuk',$data)
                ->with('listrujuk', $dataRujuk);
    }

 public function simpanedit($no_surat_rujukan)
    {
        $input =Input::all();
        $messages = [
            'no_surat_rujukan.required' => 'Nomor Surat Rujuk dibutuhkan.',
            'no_surat_rujukan.unique'   => 'Nomor Surat Rujuk sudah digunakan.',
            'tgl_rujuk.required'    => 'Tanggal Rujuk dibutuhkan.',
            'no_redis.required' => 'Nomor Rekam Medis dibutuhkan.',                       
        ];
        

        $validator = Validator::make($input, [
            'no_surat_rujukan'  => 'required',            
            'tgl_rujuk'     => 'required',
            'no_redis' => 'required',
                      ], $messages);
                     

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();
          # Bila validasi sukses
        }
        
        $editRujuk = Rujuk::find($no_surat_rujukan);
        $editRujuk->no_surat_rujukan   = $input['no_surat_rujukan']; //atau bisa Input::get('nama_dktr'); 
        $editRujuk->tgl_rujuk      = Input::get('tgl_rujuk');
        $editRujuk->no_redis  = $input['no_redis'];

        if (! $editRujuk->save())
          App::abort(500);

        Session::flash('flash_message', 'Data Rujuk "'.$input['no_surat_rujukan'].'" - " '.$input['no_redis'].'" Berhasil diubah.');
        return Redirect::action('Teknisi\RujukController@index'); 
    }

     protected function Cetak($no_surat_rujukan, $kdPrint){  
      $dataRujukan = DB::table('tb_rujuk')
                  ->join('tb_rekam_medis','tb_rujuk.no_redis','=','tb_rekam_medis.no_redis')
                  ->leftjoin('tb_pasien','tb_rekam_medis.kode_pasien','=','tb_pasien.kode_pasien')
                  ->leftjoin('tb_dokter','tb_rekam_medis.kode_dktr','=','tb_dokter.kode_dktr')
                  ->select('tb_rujuk.no_surat_rujukan', 'tb_pasien.nama_pasien', 'tb_pasien.tgl_lahir', 'tb_pasien.ortu_suami','tb_pasien.no_jaminan','tb_pasien.alamat', 'tb_pasien.pekerjaan','tb_rekam_medis.keluhan', 'tb_rekam_medis.diagnosa', 'tb_rekam_medis.therapy', 'tb_dokter.nama_dktr')
                  ->where('tb_rujuk.no_surat_rujukan','=', $no_surat_rujukan)
                  ->get();
      // dd($dataRujukan);
      $data = array('dataRujukan' => $dataRujukan);           
      $pdf = PDF::loadView('teknisi.dashboard.rujuk.cetakrujuk',$data);      
      if($kdPrint==1)
        return $pdf->download('Surat Rujukan Pasien.pdf');            
      else
        return $pdf->stream('Surat Rujukan Pasien.pdf');       
   
  }

}

