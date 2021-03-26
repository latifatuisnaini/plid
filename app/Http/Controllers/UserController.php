<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('STATUS_KONFIRMASI','=',"1") 
        ->orWhere('STATUS_KONFIRMASI','=',"0")
        ->get();
        
        return view('admin.user', compact('users'));
    }
    
    public function edit($id){
        $user = User::find($id);
        return view('admin.user', ['users' => $user]);
    }

    public function update($id){
        $user = User::find($id);
        $user->STATUS_KONFIRMASI = 1;
        $user->save();
     	return redirect()->route('user.index');
         
    } 

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.detail_user',compact('user'));
    }

}
