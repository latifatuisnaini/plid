<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permohonan;
use DB;
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
            'NPWP' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
            'KTP' => 'required|file|image|mimes:jpeg,png,jpg|max:5000'
        ]);

        $id_user = Auth::user()->ID_USER;
        $user = User::find($id_user);

        $npwp = 'NPWP_'.$id_user.'.'.$request->file('NPWP')->extension();
        Storage::disk('public')->putFileAs('dokumen',$request->NPWP,$npwp);

        $ktp = 'KTP_'.$id_user.'.'.$request->file('KTP')->extension();
        Storage::disk('public')->putFileAs('dokumen',$request->KTP,$ktp);

        $user->update([
            'FILE_NPWP' => $npwp,
            'FILE_KTP' => $ktp,
            'STATUS_KONFIRMASI' => 2
        ]);

        return redirect('users');
    }
    
}