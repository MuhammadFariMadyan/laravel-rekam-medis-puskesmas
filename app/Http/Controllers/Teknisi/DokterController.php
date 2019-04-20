<?php

namespace App\Http\Controllers\Teknisi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Response;
use DB;

use Validator;
use App\Http\Controllers\Controller;
use App\Dokter as Dokter;
use Session;

class DokterController extends Controller
{
  
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function showTambahDokter()
  {
    return view('teknisi.dashboard.dokter.tambahdokter');
  }

  public function index()
  {
    $dataDokter= Dokter::select(DB::raw("kode_dktr, nama_dktr, alamat_dktr, tgl_lahir_dktr, agama_dktr, pend_trkhr_dktr, telp_dktr"))
        ->orderBy(DB::raw("kode_dktr"))        
        ->get();
        
    $data = array('dokter' => $dataDokter);   
    return view('teknisi.dashboard.dokter.dokter',$data);
  }    

  public function hapus($kode_dktr)
  {
  
    $kode_dktr = Dokter::where('kode_dktr', '=', $kode_dktr)->first();

    if ($kode_dktr == null)
      app::abort(404);
    
    Session::flash('flash_message', 'Data Dokter "'.$kode_dktr->kode_dktr.'" - "'.$kode_dktr->nama_dktr.'" Berhasil dihapus.');

    $kode_dktr->delete();
    
    return Redirect::action('Teknisi\DokterController@index');

  }

  protected function validator(array $data)
  {
        $messages = [
            'kode_dktr.required' => 'Kode Dokter dibutuhkan.',
            'kode_dktr.unique'   => 'Kode Dokter sudah digunakan.',
            'nama_dktr.required' => 'Nama Dokter dibutuhkan.',
            'alamat_dktr.required' => 'Alamat Dokter dibutuhkan.',
            'tgl_lahir_dktr.required' => 'Tanggal Lahir Dokter dibutuhkan.',
            'agama_dktr.required' => 'Agama Dokter dibutuhkan.',
            'pend_trkhr_dktr.required' => 'Pendidikan Terakhir Dokter dibutuhkan.',
            'telp_dktr.required' => 'Telpon Dokter dibutuhkan.',
        ];
    
        return Validator::make($data, [
            'kode_dktr'       => 'required|unique:tb_dokter',            
            'kode_dktr'       => 'required',
            'nama_dktr'       => 'required',
            'alamat_dktr'     => 'required',
            'tgl_lahir_dktr'  => 'required',
            'agama_dktr'      => 'required',
            'pend_trkhr_dktr' => 'required',
            'telp_dktr'       => 'required',
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
            'kode_dktr.required' => 'Kode Dokter dibutuhkan.',
            'kode_dktr.unique'   => 'Kode Dokter sudah digunakan.',
            'nama_dktr.required' => 'Nama Dokter dibutuhkan.',
            'alamat_dktr.required' => 'Alamat Dokter dibutuhkan.',
            'tgl_lahir_dktr.required' => 'Tanggal Lahir Dokter dibutuhkan.',
            'agama_dktr.required' => 'Agama Dokter dibutuhkan.',
            'pend_trkhr_dktr.required' => 'Pendidikan Terakhir Dokter dibutuhkan.',
            'telp_dktr.required' => 'Telpon Dokter dibutuhkan.',          
        );

        $aturan = array(
            'kode_dktr'       => 'required|unique:tb_dokter',            
            'kode_dktr'       => 'required',
            'nama_dktr'       => 'required',
            'alamat_dktr'     => 'required',
            'tgl_lahir_dktr'  => 'required',
            'agama_dktr'      => 'required',
            'pend_trkhr_dktr' => 'required',
            'telp_dktr'       => 'required',            
        );
        

        $validator = Validator::make($input,$aturan, $pesan);

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();
        }
        # Bila validasi sukses

        $dokter = new Dokter;
        $dokter->kode_dktr      = $request['kode_dktr'];
        $dokter->nama_dktr      = $request['nama_dktr'];
        $dokter->alamat_dktr    = $request['alamat_dktr'];
        $dokter->tgl_lahir_dktr = $request['tgl_lahir_dktr'];
        $dokter->agama_dktr     = $request['agama_dktr'];
        $dokter->pend_trkhr_dktr= $request['pend_trkhr_dktr'];
        $dokter->telp_dktr      = $request['telp_dktr'];        

        //melakukan save, jika gagal (return value false) lakukan harakiri
        //error kode 500 - internel server error
        if (! $dokter->save() )
          App::abort(500);

        Session::flash('flash_message', 'Data Dokter "'.$request['kode_dktr'].'" - " '.$request['nama_dktr'].'" Berhasil disimpan.');

        return Redirect::action('Teknisi\DokterController@index');
  }   

 public function editdokter($kode_dktr)
    {

        $data = Dokter::find($kode_dktr);
        $dokter = Dokter::orderBy('kode_dktr')->get();

        return view('teknisi.dashboard.dokter.editdokter',$data)
                ->with('listdokter', $dokter);
    }

 public function simpanedit($kode_dktr)
    {
        $input =Input::all();
        $messages = [
            'kode_dktr.required' => 'Kode Dokter dibutuhkan.',
            'kode_dktr.unique'   => 'Kode Dokter sudah digunakan.',
            'nama_dktr.required' => 'Nama Dokter dibutuhkan.',
            'alamat_dktr.required' => 'Alamat Dokter dibutuhkan.',
            'tgl_lahir_dktr.required' => 'Tanggal Lahir Dokter dibutuhkan.',
            'agama_dktr.required' => 'Agama Dokter dibutuhkan.',
            'pend_trkhr_dktr.required' => 'Pendidikan Terakhir Dokter dibutuhkan.',
            'telp_dktr.required' => 'Telpon Dokter dibutuhkan.',            
        ];
        

        $validator = Validator::make($input, [
            'kode_dktr'       => 'required',            
            'kode_dktr'       => 'required',
            'nama_dktr'       => 'required',
            'alamat_dktr'     => 'required',
            'tgl_lahir_dktr'  => 'required',
            'agama_dktr'      => 'required',
            'pend_trkhr_dktr' => 'required',
            'telp_dktr'       => 'required',
        ], $messages);
                     

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();          
        }
        # Bila validasi sukses
        $editDokter = Dokter::find($kode_dktr);
        $editDokter->kode_dktr      = $input['kode_dktr']; //atau bisa Input::get('nama_dktr'); 
        $editDokter->nama_dktr      = Input::get('nama_dktr'); 
        $editDokter->alamat_dktr    = $input['alamat_dktr'];
        $editDokter->tgl_lahir_dktr = $input['tgl_lahir_dktr'];
        $editDokter->agama_dktr     = $input['agama_dktr'];
        $editDokter->pend_trkhr_dktr= $input['pend_trkhr_dktr'];
        $editDokter->telp_dktr      = $input['telp_dktr'];

        if (! $editDokter->save())
          App::abort(500);

        Session::flash('flash_message', 'Data Dokter "'.$input['kode_dktr'].'" - " '.$input['nama_dktr'].'" Berhasil diubah.');

        return Redirect::action('Teknisi\DokterController@index'); 
    }

}

