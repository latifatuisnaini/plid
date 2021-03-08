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
        if(Auth::user()->TIPE_USER == "1" || Auth::user()->TIPE_USER == 1){
            return redirect('admin');
        }
        else {
            if(Auth::user()->STATUS_KONFIRMASI == "0" || Auth::user()->STATUS_KONFIRMASI == 0){
                Auth::logout();
                return redirect()->back()->with('errorEmail','Akun Anda belum dikonfirmasi oleh Admin.');
            }
            else{
                return redirect('users');
            }
        }
    }
}
