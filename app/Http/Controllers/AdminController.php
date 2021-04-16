<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permohonan;
use App\Models\User;
use Illuminate\Support\Carbon;
use DB;

class AdminController extends Controller
{
    public function index()
    {
        $permohonan_open = Permohonan::where('ID_STATUS', '1')->whereYear('TANGGAL', date('Y'))->count();
        $permohonan_diproses = Permohonan::where('ID_STATUS', '2')->whereYear('TANGGAL', date('Y'))->count();
        $permohonan_diterima = Permohonan::where('ID_STATUS', '3')->whereYear('TANGGAL', date('Y'))->count();
        $konfirmasi = User::where('STATUS_KONFIRMASI', '0')->whereYear('created_at', date('Y'))->count();
        $jml_permohonan_this_month  = Permohonan::whereMonth(
            'tanggal', '=', Carbon::now()->month
        )->whereYear('TANGGAL', date('Y'))->count();
        $jml_permohonan_last_month  = Permohonan::whereMonth(
            'tanggal', '=', Carbon::now()->subMonth()->month
        )->whereYear('TANGGAL', date('Y'))->count();

        $list_permohonan = Permohonan::select(DB::raw('DATE_FORMAT(permohonan.TANGGAL, "%d %M %Y") as tgl_permohonan'), 'permohonan.DOKUMEN_PERMOHONAN', 'users.NAMA_LENGKAP')
        ->join('users', 'users.ID_USER', '=', 'permohonan.ID_USER')
        ->orderByDesc('ID_PERMOHONAN')
        ->limit(4)
        ->get();
        
        $current_year = date('Y');

        $januari = Permohonan::whereMonth('TANGGAL','01')->whereYear('TANGGAL',date('Y'))->count();
        $februari = Permohonan::whereMonth('TANGGAL','02')->whereYear('TANGGAL',date('Y'))->count();
        $maret = Permohonan::whereMonth('TANGGAL','03')->whereYear('TANGGAL',date('Y'))->count();
        $april= Permohonan::whereMonth('TANGGAL','04')->whereYear('TANGGAL',date('Y'))->count();
        $mei = Permohonan::whereMonth('TANGGAL','05')->whereYear('TANGGAL',date('Y'))->count();
        $juni = Permohonan::whereMonth('TANGGAL','06')->whereYear('TANGGAL',date('Y'))->count();
        $juli = Permohonan::whereMonth('TANGGAL','07')->whereYear('TANGGAL',date('Y'))->count();
        $agustus = Permohonan::whereMonth('TANGGAL','08')->whereYear('TANGGAL',date('Y'))->count();
        $september= Permohonan::whereMonth('TANGGAL','09')->whereYear('TANGGAL',date('Y'))->count();
        $oktober= Permohonan::whereMonth('TANGGAL','10')->whereYear('TANGGAL',date('Y'))->count();
        $november = Permohonan::whereMonth('TANGGAL','11')->whereYear('TANGGAL',date('Y'))->count();
        $desember = Permohonan::whereMonth('TANGGAL','12')->whereYear('TANGGAL',date('Y'))->count();

        $permohonan_open_notif = Permohonan::where('ID_STATUS', '1')->count();
        $permohonan_diproses_notif = Permohonan::where('ID_STATUS', '2')->count();

        return view('admin.dashboard', compact('permohonan_open', 'permohonan_diproses', 'permohonan_open_notif', 'permohonan_diproses_notif','permohonan_diterima', 'konfirmasi', 'jml_permohonan_last_month', 'jml_permohonan_this_month', 
        'current_year', 'list_permohonan', 'januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'));
    }

}
