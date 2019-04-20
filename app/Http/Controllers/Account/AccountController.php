<?php

namespace App\Http\Controllers\Account;

use App\User;
use App\Mahasiswa;
use App\Dosen;
use DB;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    protected function showAccountDosen()
    {
        $dataUser = Dosen::select(DB::raw("users.id as id, dsnNidn, dsnNip , dsnNama, name, username, password, jurNama, prodiNama, level"))     
            ->leftjoin('users','dsnNip','=','users.username')
            ->join('program_studi', 'program_studi.prodiKode', '=', 'dsnProdiKode')
            ->join('jurusan','prodiKodeJurusan','=','jurusan.jurKode')
            //->where('users.level','=','3')
            ->orderBy(DB::raw("dsnNama"))        
            ->get();
        //$data = array('kelas' => $dataKelas);
        return view('admin.dashboard.account.regdosen',
            array('listAccountDosen' => $dataUser));

    }

    protected function insertAccountDosen(array $data)
    {

        $account = new User();
        $account->username         = $data['username'];
        $account->password         = bcrypt($data['password']);
        $account->level            = 2;

        //melakukan save, jika gagal (return value false) lakukan harakiri
        //error kode 500 - internel server error
        if (! $account->save() )
          App::abort(500);
    }
 

    public function tambahAccountDosen(Request $request)
    {
        $validator = $this->validator($request->all());
 
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
            //return Response::json( array('errors' => $validator->errors()->toArray()),422);
        }
 
        $this->insertAccountDosen($request->all());
 
        return response()->json($request->all(),200);

    }

    protected function hapusDosen($id)
    {
   
        $UserKode = User::where('id', '=', $id)->first();        
        if ($UserKode == null)
          app::abort(404);

        $UserKode->delete();
        return redirect()->route('account.dosen');
        
    }


    //Manage Mahasiswa

    protected function showAccountMahasiswa()
    {
        $dataUser = Mahasiswa::select(DB::raw("users.id as id, mhsNim as Nim, mhsNama, name, username, email, password, remember_token, jurNama, prodiNama, level"))     
            ->leftjoin('users','mhsNim','=','users.username')
            ->join('program_studi', 'program_studi.prodiKode', '=', 'mhsProdiKode')
            ->join('jurusan','prodiKodeJurusan','=','jurusan.jurKode')
            //->where('users.level','=','3')
            ->orderBy(DB::raw("Nim"))        
            ->get();
        //$data = array('kelas' => $dataKelas);
        return view('admin.dashboard.account.regmahasiswa',
            array('listAccountMahasiswa' => $dataUser));

    }

/*    protected function registerMahasiswa()
    {
        $dataUser = User::select(DB::raw("name, username, email, password, remember_token, created_at, updated_at,level"))      
            ->orderBy(DB::raw("username"))        
            ->get();
        //$data = array('kelas' => $dataKelas);
        return view('admin.dashboard.register.mahasiswa',
            array('listAccountMahasiswa' => $dataUser));

    }*/

    protected function hapusMahasiswa($id)
    {
   
        $UserKode = User::where('id', '=', $id)->first();        
        if ($UserKode == null)
          app::abort(404);

        $UserKode->delete();
        return redirect()->route('account.mahasiswa');
        
    }

    protected function validator(array $data)
    {
        $messages = [
            'username.required'    => 'Username dibutuhkan.',
            'username.unique'      => 'Username sudah dipakai.',
            'password.required'    => 'Password dibutuhkan.',
            'password.confirmed'   => 'Password dan Konfirmasi password tidak sama.',
            'password.min'         => 'Panjang password minimal 6 karakter',
            
        ];
        return Validator::make($data, [
            'username' => 'required|unique:users',
            'password' => 'required|confirmed|min:6',
            
        ], $messages);
    }
 
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function insertAccountMahasiswa(array $data)
    {

        $account = new User();
        $account->username         = $data['username'];
        $account->password         = bcrypt($data['password']);
        $account->level            = 3;

        //melakukan save, jika gagal (return value false) lakukan harakiri
        //error kode 500 - internel server error
        if (! $account->save() )
          App::abort(500);
    }
 

    public function tambahAccountMahasiswa(Request $request)
    {
        $validator = $this->validator($request->all());
 
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
            return Response::json( array('errors' => $validator->errors()->toArray()),422);
        }
 
        $this->insertAccountMahasiswa($request->all());
 
        return response()->json($request->all(),200);

    }


}