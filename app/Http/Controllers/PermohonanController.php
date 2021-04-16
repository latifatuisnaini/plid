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
        $permohonan=Permohonan::where('ID_USER', Auth::user()->ID_USER)->orderByDesc('ID_PERMOHONAN')->get();
        $permohonan2=Permohonan::
        select('feedback.ID_FEEDBACK','feedback.LINK_DOWNLOAD','feedback.EXPIRED_DATE')
        ->join('feedback', 'feedback.ID_PERMOHONAN', '=', 'permohonan.ID_PERMOHONAN')
        ->where('ID_USER', Auth::user()->ID_USER)
        ->get();

        $permohonan_open_notif = Permohonan::where('ID_STATUS', '1')->count();
        $permohonan_diproses_notif = Permohonan::where('ID_STATUS', '2')->count();
        $dokumen=Dokumen::all();
        $now=Carbon::now()->format('Y-m-d');
        
        foreach($permohonan2 as $p){
            if($now > $p->EXPIRED_DATE){
                Storage::disk('public')->delete('dokumen/'.$p->LINK_DOWNLOAD);
            }
        }

       return view('users.permohonan', compact('permohonan','permohonan_open_notif', 'permohonan_diproses_notif','now','permohonan2'));
    }

    public function create(){
        $permohonan=Permohonan::all();
        return view('users.permohonan', compact('permohonan'));
    }

    public function store(Request $request){
        $request->validate([
            'DOKUMEN_PERMOHONAN'=> 'required|string|max:100|regex:/^[0-9.\a-zA-Z ]+$/',
            'KETERANGAN'=> 'required|string|max:255|regex:/^[0-9.\a-zA-Z ]+$/',
            'BENTUK_DOK'=>'required',
            'JENIS_DOK'=>'required|string|max:50|regex:/^[0-9.\a-zA-Z ]+$/',
        ]);
        
        Permohonan::insert([
            'DOKUMEN_PERMOHONAN'=> $request->DOKUMEN_PERMOHONAN,
            'KETERANGAN'=> $request->KETERANGAN,
            'ID_STATUS'=>1,
            'ID_USER'=>$request->ID_USER,
            'BENTUK_DOK'=>$request->BENTUK_DOK,
            'JENIS_DOK'=>$request->JENIS_DOK,
        ]);

        return redirect('/users/permohonan')->with('success', 'Data Permohonan Berhasil Ditambahkan. Silahkan lakukan pengecekan secara berkala');

    }   
    public function show($id){
        $feedback = Feedback::find($id);
        //dd($feedback);
        return Storage::disk('public')->download('dokumen/'.$feedback->LINK_DOWNLOAD);
        
    }
    
}