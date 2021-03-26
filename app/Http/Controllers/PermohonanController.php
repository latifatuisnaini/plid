<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use DB;

class PermohonanController extends Controller
{
    public function index()
    {
       $permohonan=Permohonan::
        where('ID_USER', Auth::user()->ID_USER)
        ->get();
        
       return view('users.permohonan', compact('permohonan'));
    }

    public function create(){
        $permohonan=Permohonan::all();
        return view('users.permohonan', compact('permohonan'));
    }

    public function store(Request $request){
        $request->validate([
            'DOKUMEN_PERMOHONAN'=> 'required|string|max:100|regex:/^[0-9.\a-zA-Z ]+$/',
            'KETERANGAN'=> 'required|string|max:255|regex:/^[0-9.\a-zA-Z ]+$/',
            'TANGGAL'=>'required',
        ]);

        $date=Carbon::parse($request->TANGGAL);
        $date->format('Y-m-d');
        
        Permohonan::insert([
            'DOKUMEN_PERMOHONAN'=> $request->DOKUMEN_PERMOHONAN,
            'KETERANGAN'=> $request->KETERANGAN,
            'TANGGAL'=> $date,
            'ID_STATUS'=>1,
            'ID_USER'=>$request->ID_USER,
        ]);

        return redirect('/users/permohonan')->with('success', 'Data Permohonan Berhasil Ditambahkan');

    }

    
}