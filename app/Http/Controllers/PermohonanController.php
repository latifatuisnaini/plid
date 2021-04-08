<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\Feedback;
use App\Models\Permohonan;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Storage;
use Auth;
use DB;

class PermohonanController extends Controller
{
    public function index()
    {
       $permohonan=Permohonan::where('ID_USER', Auth::user()->ID_USER)->get();
        $permohonan_open_notif = Permohonan::where('ID_STATUS', '1')->count();
        $permohonan_diproses_notif = Permohonan::where('ID_STATUS', '2')->count();
        $dokumen=Dokumen::all();
        $feedback=Feedback::all();
        $now=Carbon::now('Asia/Jakarta');
        
        foreach($feedback as $f){
        
            $exp=Carbon::createFromFormat('Y-m-d',$f->EXPIRED_DATE);
            if($now->greaterThan($exp)){
                Storage::disk('public')->delete('dokumen/'.$f->LINK_DOWNLOAD);
            }
        }

       return view('users.permohonan', compact('permohonan','permohonan_open_notif', 'permohonan_diproses_notif','now','exp'));
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
    public function show($id){
        $feedback = Feedback::find($id);
        
        return Storage::disk('public')->download('dokumen/'.$feedback->LINK_DOWNLOAD);
        
    }
    
}