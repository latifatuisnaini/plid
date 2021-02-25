<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user', [
            'users' => User::all()
        ]);
    }
    
    public function edit($id){
        $user = User::find($id);
        return view('admin.user', ['users' => $user]);
    }

    public function update($id){

        // $this->validate($request,[
    	// 	'STATUS_KONFIRMASI' => 'required'
    	// ]);
        $user = User::find($id);
        $user->STATUS_KONFIRMASI = 1;
        $user->save();
     	return redirect()->route('user.index');
         
    } 


}
