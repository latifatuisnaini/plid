<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permohonan;
use App\Models\Feedback;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Storage;

class UsersController extends Controller
{
    public function index()
    {
        $permohonan_open = Permohonan::where('ID_STATUS', '=', '1')->whereYear('TANGGAL', date('Y'))
        ->where('ID_USER', '=', Auth::user()->ID_USER)
        ->count();
        $permohonan_diproses = Permohonan::where('ID_STATUS', '=', '2')->whereYear('TANGGAL', date('Y'))
        ->where('ID_USER', '=', Auth::user()->ID_USER)
        ->count();
        $permohonan_diterima = Permohonan::where('ID_STATUS', '=', '3')->whereYear('TANGGAL', date('Y'))
        ->where('ID_USER', '=', Auth::user()->ID_USER)
        ->count();
        $permohonan_ditolak = Permohonan::where('ID_STATUS', '=', '4')->whereYear('TANGGAL', date('Y'))
        ->where('ID_USER', '=', Auth::user()->ID_USER)
        ->count();
            if(Auth::user()->STATUS_KONFIRMASI == "0" || Auth::user()->STATUS_KONFIRMASI == 0 || Auth::user()->STATUS_KONFIRMASI == "1" || Auth::user()->STATUS_KONFIRMASI == 1 || Auth::user()->STATUS_KONFIRMASI == "2" || Auth::user()->STATUS_KONFIRMASI == 2 || Auth::user()->STATUS_KONFIRMASI == "4" || Auth::user()->STATUS_KONFIRMASI == 4){
                $verified="Belum Aktif";
            }
            else{
                if(Auth::user()->STATUS_KONFIRMASI == "3" || Auth::user()->STATUS_KONFIRMASI == 3 ){
                $verified="Aktif";     
            }
        }
        $list_permohonan = Permohonan::select(DB::raw('DATE_FORMAT(permohonan.TANGGAL, "%d %M %Y") as tgl_permohonan'), 'permohonan.DOKUMEN_PERMOHONAN', 'status.STATUS')
        ->join('status', 'status.ID_STATUS', '=', 'permohonan.ID_STATUS')
        ->where('ID_USER', '=', Auth::user()->ID_USER)
        ->orderByDesc('ID_PERMOHONAN')
        ->limit(4)
        ->get();
               
        return view('users.dashboard', compact('verified', 'list_permohonan', 'permohonan_open', 'permohonan_diproses', 'permohonan_diterima', 'permohonan_ditolak'));
    }

    public function uploadDokumen(Request $request)
    {
        $request->validate([
            'KTP' => 'required|file|image|mimes:jpeg,png,jpg|max:5000'
        ]);

        $id_user = Auth::user()->ID_USER;
        $user = User::find($id_user);

        $ktp = 'KTP_'.$id_user.'.'.$request->file('KTP')->extension();
        Storage::disk('public')->putFileAs('dokumen',$request->KTP,$ktp);

        $user->update([
            'FILE_KTP' => $ktp,
            'STATUS_KONFIRMASI' => 2
        ]);

        return redirect('users');
    }

    public function show($id)
    {
        $user = User::find($id);
        $permohonan_open_notif = Permohonan::where('ID_STATUS', '1')->count();
        $permohonan_diproses_notif = Permohonan::where('ID_STATUS', '2')->count();
        return view('users.profile',compact('user','permohonan_open_notif', 'permohonan_diproses_notif'));
    }
    
    public function formpermohonan($id){
        $id_user = Auth::user();
        $permohonan = Permohonan::where('ID_PERMOHONAN','=',$id)
        ->first();
        $idadmin = User::where('ID_USER','=',$permohonan->ID_PETUGAS)->first();
        // dd($idadmin);

        $pdf = \PDF::loadView('/users/form-permohonan', compact('permohonan','idadmin'));
        return $pdf->stream('Format Permohonan Informasi PAL.pdf');
    }

    public function formpemberitahuan($id){        
        $pemberitahuan = Permohonan::select(DB::raw('DATE_FORMAT(permohonan.TANGGAL, "%d %M %Y") as tgl_permohonan'),'permohonan.ID_PERMOHONAN','permohonan.KETERANGAN','feedback.TGL_FEEDBACK','feedback.WAKTU_ESTIMASI','feedback.KETERANGAN_ESTIMASI','permohonan.ID_STATUS')
        ->join('feedback', 'feedback.ID_PERMOHONAN', '=', 'permohonan.ID_PERMOHONAN')
        ->where('permohonan.ID_PERMOHONAN','=',$id)
        ->first();
        $id_user = Auth::user();
        $pemberitahuan = Permohonan::find($id);
        $waktuestimasi = date_create($pemberitahuan->feedback->WAKTU_ESTIMASI);
        $waktupengajuan = date_create($pemberitahuan->TANGGAL);
        $interval = date_diff($waktupengajuan,$waktuestimasi);
        $idadmin = User::where('ID_USER','=',$pemberitahuan->ID_PETUGAS)->first();

        $pdf = \PDF::loadView('/users/form-pemberitahuan', compact('pemberitahuan','id_user','interval','idadmin'));
        return $pdf->stream('Formulir Pemberitahuan Tertulis.pdf');
    }

}