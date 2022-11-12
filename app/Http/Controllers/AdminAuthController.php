<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
	public function viewLogin(){
		$title = 'Login';
		
		return view('admin.auth.login',[
			'title' => $title
		]);
	}

	public function authenticate(Request $request){
		$this->validate($request,[
			'email' => 'required',
			'password' => 'required',
		]);

		$credential = $request->only('email', 'password');

		if(Auth::attempt($credential)){
			return redirect()->route('admin.index');
		}

		return redirect()->route('login')->with('error', 'Email atau password yang anda masukkan salah. Silahkan coba lagi.');
	}

	public function logout(Request $request){
		$request->session()->flush();
		Auth::logout();
		return redirect()->route('login');
	}

}
