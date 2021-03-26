<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permohonan;

class DocverifController extends Controller
{
    public function index()
    {
        $users = User::where('STATUS_KONFIRMASI','=',"2") 
        ->get();
        $permohonan_open_notif = Permohonan::where('ID_STATUS', '1')->count();
        $permohonan_diproses_notif = Permohonan::where('ID_STATUS', '2')->count();
        
        return view('admin.verif', compact('users','permohonan_open_notif', 'permohonan_diproses_notif'));
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.verif', ['users' => $user]);
    }

    public function update($id){
        $user = User::find($id);
        $user->STATUS_KONFIRMASI = 3;
        $user->save();
     	return redirect()->route('verif.index')->with('message','Success'); 
    }
    
    public function update1(Request $request){
        $user = User::find($request->ID_USER);
        $user->STATUS_KONFIRMASI = 4;
        $user->save();
     	return redirect()->route('verif.index')->with('message','Success');     
    }
}
