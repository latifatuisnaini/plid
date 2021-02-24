<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permohonan;

class AdminController extends Controller
{
    public function index()
    {
        $permohonan_open = Permohonan::where('ID_STATUS', '1')->count('ID_PERMOHONAN');
        $permohonan_diproses = Permohonan::where('ID_STATUS', '2')->count('ID_PERMOHONAN');
        $permohonan_diterima = Permohonan::where('ID_STATUS', '3')->count('ID_PERMOHONAN');
        return view('admin.dashboard', compact('permohonan_open', 'permohonan_diproses', 'permohonan_diterima'));
    }

}
