<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class StudentAuthController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('guest:student')->except('postLogout');
    // }

    public function getLogin()
    {
        return view('student.auth.login');
    }

    public function authenticate(Request $request){
		$this->validate($request,[
			'nisn' => 'required',
			'password' => 'required',
		]);

		$credential = $request->only('nisn', 'password');

		if(Auth::guard('student')->attempt($credential) && Auth::guard('student')->user()->status == 'active'){
			return redirect()->route('students.dashboard');
		}

		return redirect()->route('students.login')->with('error', 'NISN atau password yang anda masukkan salah. Silahkan coba lagi.');
	}

	public function logout(Request $request){
		$request->session()->flush();
		Auth::guard('student')->logout();
		return redirect()->route('students.login');
	}
}
