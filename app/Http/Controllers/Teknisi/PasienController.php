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
use App\Pasien as Pasien;
use Session;

class PasienController extends Controller
{
  
  public function __construct()
  {
    $this->middleware('auth');
  }  

  public function showTambahPasien()
  {
    
    return view('teknisi.dashboard.pasien.tambahpasien');
  } 

  public function index()
  {
    $dataPasien= Pasien::select(DB::raw("kode_pasien, nama_pasien, alamat, rt, rw, tgl_lahir, agama, Jen_pmbyrn, no_jaminan, pekerjaan, pend_trkhr, telp, ortu_suami, istri_anak, alergi_obat"))
        ->orderBy(DB::raw("kode_pasien"))        
        ->get();
        
    $data = array('pasien' => $dataPasien);   
    return view('teknisi.dashboard.pasien.pasien',$data);
  }    

  public function hapus($kode_pasien)
  {
  
    $kode_pasien = Pasien::where('kode_pasien', '=', $kode_pasien)->first();

    if ($kode_pasien == null)
      app::abort(404);

    $kode_pasien->delete();

    return Redirect::action('Teknisi\PasienController@index');

  }

  protected function validator(array $data)
  {
        $messages = [
            'kode_pasien.required' => 'Kode Pasien dibutuhkan.',
            'kode_pasien.unique'   => 'Kode Pasien sudah digunakan.',
            'nama_pasien.required' => 'Nama Pasien dibutuhkan.',
            'alamat.required'      => 'Alamat dibutuhkan.',
            'rt.required'          => 'rt dibutuhkan.',
            'rw.required'          => 'rw dibutuhkan.',
            'tgl_lahir.required'   => 'Tanggal Lahir dibutuhkan.',
            'agama.required'       => 'Agama dibutuhkan.',
            'Jen_pmbyrn.required'  => 'Jenis Pembayaran dibutuhkan.',
            'no_jaminan.required'  => 'Nomor Jaminan dibutuhkan.',      
            'pekerjaan.required'   => 'Pekerjaan dibutuhkan.',
            'pend_trkhr.required'  => 'Pendidikan Terakhir dibutuhkan.',
            'telp.required'        => 'Telpon dibutuhkan.',
            'ortu_suami.required'  => 'Nama Ortu/Suami dibutuhkan.',
            'istri_anak.required'  => 'Nama Istri/Anak dibutuhkan.',
            'alergi_obat.required' => 'Alergi Obat dibutuhkan.',            
        ];
    
        return Validator::make($data, [
            'kode_pasien'  => 'required|unique:tb_pasien',            
            'nama_pasien'  => 'required',
            'alamat'       => 'required',
            'rt'           => 'required',
            'rw'           => 'required',
            'tgl_lahir'    => 'required',
            'agama'        => 'required',
            'Jen_pmbyrn'   => 'required',
            'no_jaminan'   => 'required',
            'pekerjaan'    => 'required',
            'pend_trkhr'   => 'required',
            'telp'         => 'required',
            'ortu_suami'   => 'required',
            'istri_anak'   => 'required',
            'alergi_obat'  => 'required',
        ], $messages);
  }
 
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
  protected function tambah(Request $request)
  {

        $input =$request->all();
        $pesan = array(
            'kode_pasien.required' => 'Kode Pasien dibutuhkan.',
            'kode_pasien.unique'   => 'Kode Pasien sudah digunakan.',
            'nama_pasien.required' => 'Nama Pasien dibutuhkan.',
            'alamat.required'      => 'Alamat dibutuhkan.',
            'rt.required'          => 'rt dibutuhkan.',
            'rw.required'          => 'rw dibutuhkan.',
            'tgl_lahir.required'   => 'Tanggal Lahir dibutuhkan.',
            'agama.required'       => 'Agama dibutuhkan.',
            'Jen_pmbyrn.required'  => 'Jenis Pembayaran dibutuhkan.',
            'no_jaminan.required'  => 'Nomor Jaminan dibutuhkan.',      
            'pekerjaan.required'   => 'Pekerjaan dibutuhkan.',
            'pend_trkhr.required'  => 'Pendidikan Terakhir dibutuhkan.',
            'telp.required'        => 'Telpon dibutuhkan.',
            'ortu_suami.required'  => 'Nama Ortu/Suami dibutuhkan.',
            'istri_anak.required'  => 'Nama Istri/Anak dibutuhkan.',
            'alergi_obat.required' => 'Alergi Obat dibutuhkan.',            
        );

        $aturan = array(

            'kode_pasien'  => 'required|unique:tb_pasien',            
            'nama_pasien'  => 'required',
            'alamat'       => 'required',
            'rt'           => 'required',
            'rw'           => 'required',
            'tgl_lahir'    => 'required',
            'agama'        => 'required',
            'Jen_pmbyrn'   => 'required',
            'no_jaminan'   => 'required',
            'pekerjaan'    => 'required',
            'pend_trkhr'   => 'required',
            'telp'         => 'required',
            'ortu_suami'   => 'required',
            'istri_anak'   => 'required',
            'alergi_obat'  => 'required',
            
        );
        

        $validator = Validator::make($input,$aturan, $pesan);

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();
        }
        # Bila validasi sukses
        $pasien = new Pasien;
        $pasien->kode_pasien  = $request['kode_pasien'];
        $pasien->nama_pasien  = $request['nama_pasien'];
        $pasien->alamat       = $request['alamat'];
        $pasien->rt           = $request['rt'];
        $pasien->rw           = $request['rw'];
        $pasien->tgl_lahir    = $request['tgl_lahir'];
        $pasien->agama        = $request['agama'];
        $pasien->Jen_pmbyrn   = $request['Jen_pmbyrn'];
        $pasien->no_jaminan   = $request['no_jaminan'];
        $pasien->pekerjaan    = $request['pekerjaan'];
        $pasien->pend_trkhr   = $request['pend_trkhr'];
        $pasien->telp         = $request['telp'];
        $pasien->ortu_suami   = $request['ortu_suami'];
        $pasien->istri_anak   = $request['istri_anak'];
        $pasien->alergi_obat  = $request['alergi_obat'];

        //melakukan save, jika gagal (return value false) lakukan harakiri
        //error kode 500 - internel server error
        if (! $pasien->save() )
          App::abort(500);        

        Session::flash('flash_message', 'Data Pasien "'.$request['kode_pasien'].'" - " '.$request['nama_pasien'].'" Berhasil disimpan.');

        return Redirect::action('Teknisi\PasienController@index');

                                  
  }
 
  public function tambahpasien(Request $request)
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

 public function editpasien($kode_pasien)
    {

        $data = Pasien::find($kode_pasien);
        $pasien = Pasien::orderBy('kode_pasien')->get();

        return view('teknisi.dashboard.pasien.editpasien',$data)
                ->with('listpasien', $pasien);        
    }

 public function simpanedit($kode_pasien)
    {
        $input =Input::all();
        $messages = [
            'kode_pasien.required' => 'Kode Pasien dibutuhkan.',
            'kode_pasien.unique'   => 'Kode Pasien sudah digunakan.',
            'nama_pasien.required' => 'Nama Pasien dibutuhkan.',
            'alamat.required'      => 'Alamat dibutuhkan.',
            'rt.required'          => 'rt dibutuhkan.',
            'rw.required'          => 'rw dibutuhkan.',
            'tgl_lahir.required'   => 'Tanggal Lahir dibutuhkan.',
            'agama.required'       => 'Agama dibutuhkan.',
            'Jen_pmbyrn.required'  => 'Jenis Pembayaran dibutuhkan.',
            'no_jaminan.required'  => 'Nomor Jaminan dibutuhkan.',      
            'pekerjaan.required'   => 'Pekerjaan dibutuhkan.',
            'pend_trkhr.required'  => 'Pendidikan Terakhir dibutuhkan.',
            'telp.required'        => 'Telpon dibutuhkan.',
            'ortu_suami.required'  => 'Nama Ortu/Suami dibutuhkan.',
            'istri_anak.required'  => 'Nama Istri/Anak dibutuhkan.',
            'alergi_obat.required' => 'Alergi Obat dibutuhkan.',            
        ];
        

        $validator = Validator::make($input, [
                          'kode_pasien'  => 'required',            
                          'nama_pasien'  => 'required|max:50',
                          'alamat'       => 'required',
                          'rt'           => 'required',
                          'rw'           => 'required',
                          'tgl_lahir'    => 'required',
                          'agama'        => 'required',
                          'Jen_pmbyrn'   => 'required',
                          'no_jaminan'   => 'required',
                          'pekerjaan'    => 'required',
                          'pend_trkhr'   => 'required',
                          'telp'         => 'required',
                          'ortu_suami'   => 'required',
                          'istri_anak'   => 'required',
                          'alergi_obat'  => 'required',
                      ], $messages);
                     

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();          
        }
        # Bila validasi sukses
        $editPasien = Pasien::find($kode_pasien);
        $editPasien->kode_pasien  = $input['kode_pasien']; //atau bisa Input::get('nama_pasien'); 
        $editPasien->nama_pasien  = Input::get('nama_pasien');
        $editPasien->alamat       = $input['alamat'];
        $editPasien->rt           = $input['rt'];
        $editPasien->rw           = $input['rw'];
        $editPasien->tgl_lahir    = $input['tgl_lahir'];
        $editPasien->agama        = $input['agama'];
        $editPasien->Jen_pmbyrn   = $input['Jen_pmbyrn'];
        $editPasien->no_jaminan   = $input['no_jaminan'];
        $editPasien->pekerjaan    = $input['pekerjaan'];
        $editPasien->pend_trkhr   = $input['pend_trkhr'];
        $editPasien->telp         = $input['telp'];
        $editPasien->ortu_suami   = $input['ortu_suami'];
        $editPasien->istri_anak   = $input['istri_anak'];
        $editPasien->alergi_obat  = $input['alergi_obat'];

        if (! $editPasien->save())
          App::abort(500);

        Session::flash('flash_message', 'Data Pasien "'.Input::get('kode_pasien').'" - " '.Input::get('nama_pasien').'" Berhasil diubah.');

        return Redirect::action('Teknisi\PasienController@index');       
    }

    protected function Cetak($kode_pasien, $kdPrint){  
      $dataPasienCetak = DB::table('tb_pasien')                  
                  ->select('tb_pasien.*')
                  ->where('tb_pasien.kode_pasien','=', $kode_pasien)
                  ->get();
      // dd($dataLapRedis);
      $data = array('dataPasienCetak' => $dataPasienCetak);           
      $pdf = PDF::loadView('teknisi.dashboard.pasien.cetakpasien',$data);      
      if($kdPrint==1)
        return $pdf->download('Pasien.pdf');            
      else
        return $pdf->stream('Pasien.pdf');       
   
  }

}

