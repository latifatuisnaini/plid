<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
class UsersController extends Controller
{
    public function index()
    {
        $konfirmasi = User::where('STATUS_KONFIRMASI', '0');
        return view('users.dashboard');
    }
    
}