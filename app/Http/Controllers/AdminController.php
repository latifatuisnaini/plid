<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permohonan;
use App\Models\User;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $permohonan_open = Permohonan::where('ID_STATUS', '1')->count('ID_PERMOHONAN');
        $permohonan_diproses = Permohonan::where('ID_STATUS', '2')->count('ID_PERMOHONAN');
        $permohonan_diterima = Permohonan::where('ID_STATUS', '3')->count('ID_PERMOHONAN');
        $konfirmasi = User::where('STATUS_KONFIRMASI', '0')->count('ID_USER');
        $jml_permohonan_this_month  = Permohonan::whereMonth(
            'tanggal', '=', Carbon::now()->month
        )->count('ID_PERMOHONAN');
        $jml_permohonan_last_month  = Permohonan::whereMonth(
            'tanggal', '=', Carbon::now()->subMonth()->month
        )->count('ID_PERMOHONAN');
        return view('admin.dashboard', compact('permohonan_open', 'permohonan_diproses', 'permohonan_diterima', 'konfirmasi', 'jml_permohonan_last_month', 'jml_permohonan_this_month'));
    }

}
