<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register()
    {
        $data['title'] = 'Register';
        return view('user/register', $data); 
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:user',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ],[
            'name.required' => 'Nama Wajib di Isi',
            'username.required' => 'Username Wajib di Isi',
            'username.unique' => 'Username Sudah di Isi',
            'password.required' => 'Password Wajib di Isi',
            'password_confirmation.required' => 'Konfirmasi Password Wajib di Isi', 
            'password_confirmation.same' => 'Konfirmasi Password Harus sama', 
        ]);
        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->username,
        ]);
        $user->save();
        return redirect()->route('login')->with('success', 'Registrasi Berhasil. Silahkan Login');
    }

    public function login()
    {
        $data['title'] = 'Login';
        return view('user/login', $data); 
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],[
            'username.required' => 'Username Wajib di Isi',
            'password.required' => 'Password Wajib di Isi',  
        ]);
        $user = new User([
            'username' => $request->username,
            'password' => $request->username,
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('barang');
        }
        $user->save();
        return back()->withErrors('password', 'Username atau Password Salah');
    }
}
