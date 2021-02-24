<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tipe_user=Auth::user()->TIPE_USER;
        $status_konfirmasi=Auth::user()->STATUS_KONFIRMASI;
        if($tipe_user==1){
            return redirect('admin');
        }
        else if($tipe_user==2){
            if($status_konfirmasi==1){
                return redirect()->back()->with('email');
                @Session('email')
            }
            else{
                return redirect('user');
            }
        }
    }
}
