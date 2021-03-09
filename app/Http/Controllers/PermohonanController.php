<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use App\Models\Status;
use Illuminate\Http\Request;
use DB;

class PermohonanController extends Controller
{
    public function index()
    {

        return view('users.permohonan', [
            'permohonan' => Permohonan::all()
        ]);
    }

    public function create(){
        $permohonan=Permohonan::all();
        return view('users.permohonan', compact('permohonan'));
    }

    public function store(Request $request){
        $request->validate([
            'DOKUMEN_PERMOHONAN'=> 'required|string|max:100|regex:/^[0-9.\a-zA-Z ]+$/',
            'KETERANGAN'=> 'required|string|max:255|regex:/^[0-9.\a-zA-Z ]+$/',
            'TANGGAL'=>'required|date',
        ]);
        Permohonan::insert([
            'DOKUMEN_PERMOHONAN'=> $request->DOKUMEN_PERMOHONAN,
            'KETERANGAN'=> $request->KETERANGAN,
            'TANGGAL'=> $request->TANGGAL,
            'ID_STATUS'=>1,
        ]);

        return redirect('/users/permohonan')->with('success', 'Data Permohonan Berhasil Ditambahkan');

    }

    
}