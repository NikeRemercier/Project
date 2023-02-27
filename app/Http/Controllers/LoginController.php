<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller{
	function loginPage(){
		$lu=DB::table('level_user')->get();
		return view('login.index', ['title'=>'LOGIN', 'level_user'=>$lu]);
	}

	public function authenticate(Request $request){
        $credentials=$request->validate([
			'username'=>'required',
			'password'=>'required',
			'id_level'=>'required'
		]);

		$user=DB::table('user')->where('username', $credentials['username'])->first();
		if( Auth::attempt($credentials) ){
			$request->session()->regenerate();
			return redirect()->intended('/barang');
		}else{
			if(DB::table('user')->where('username',$credentials['username'])->count() == 0 ){
			    return back()->withErrors([
			        'username' => 'Username tidak valid'
			    ])->onlyInput('username');
			}elseif(!Hash::check($credentials['password'], $user->password)){
			    return back()->withErrors([
			        'password' => 'Password tidak valid'
			    ])->onlyInput('password');
			}else{
				return back()->withErrors([
					'id_level' => 'level pengguna tidak valid'
				])->onlyInput('id_level');
			}
		}
	}

	function logout(Request $request){
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect('/login');
	}
}
