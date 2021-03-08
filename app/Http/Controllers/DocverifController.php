<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DocverifController extends Controller
{
    public function index()
    {
        $users = User::where('STATUS_KONFIRMASI','=',"2") 
        ->get();
        
        return view('admin.verif', compact('users'));
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.verif', ['users' => $user]);
    }

    public function update($id){
        $user = User::find($id);
        $user->STATUS_KONFIRMASI = 3;
        $user->save();
     	return redirect()->route('verif.index');
         
    } 
}
