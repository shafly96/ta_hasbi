<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	public function sign_in(){
		return view('sign_in');
	}

	public function sign_up(){
		return view('sign_up');
	}

    public function create(Request $request){
    	if($request->pin == 'secret'){
    		if($request->password == $request->password2){
    			$user = new User;
    			$user->nama = $request->nama;
    			$user->perusahaan = $request->perusahaan;
    			$user->alamat = $request->alamat;
    			$user->email = $request->email;
    			$user->password = bcrypt($request->password);
    			$user->save();

    			return view('sign_in')->with('success', 'berhasil');
    		}else{
    			return view('sign_in')->with('failed', 'Password tidak sama');
    		}
    	}else{
    		return view('sign_in')->with('failed', 'PIN yang anda masukan salah');
    	}
    }
}
