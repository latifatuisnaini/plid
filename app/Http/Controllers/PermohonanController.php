<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
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

    
}