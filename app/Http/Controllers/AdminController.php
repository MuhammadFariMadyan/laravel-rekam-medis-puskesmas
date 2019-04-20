<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
//use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use App\Click as Click;
use App\View as View;
use App\User as User;


class AdminController extends Controller
{

    public function __construct(Request $request)
    {
      $this->middleware('auth');      
    }    
        /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    
    public function index(Request $request){
      $level = Auth::user()->level;

      switch ($level) {
        case "11":
            return $this->dashboardLevel11(); //Admin
            break;
        case "12":
            return $this->dashboardLevel12(); //Dokter
            break;
        case "13":
            return $this->dashboardLevel13(); //Pimpinan
            break;
        case "14":
            return $this->dashboardLevel14(); //Teknisi
            break;
        default:
            return "Dashboard SI Redis!";
      }
    }    

    public function dashBoardLevel11(){      
      return view('admin.dashboard.index.mainadm');      
    }

    public function dashBoardLevel12(){      
      return view('admin.dashboard.index.maindktr');      
    }

    public function dashBoardLevel13(){      
      return view('admin.dashboard.index.mainpmpn');      
    }

    public function dashBoardLevel14(){        
      return view('admin.dashboard.index.maintkns'); 
          
    }

}