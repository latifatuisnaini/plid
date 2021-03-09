<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
class UsersController extends Controller
{
    public function index()
    {
       
     
        
            if(User::where("STATUS_KONFIRMASI" == "3") || User::where("STATUS_KONFIRMASI" == 3)){
                $verified="Belum Aktif";
             
            }
            else{
                if(User::where("STATUS_KONFIRMASI" == "4") || User::where("STATUS_KONFIRMASI" == 4)){
                $verified="Aktif";
             
            }
            else{
                
            }
        }


        
        return view('users.dashboard', compact('verified'));
    }
    
    
}