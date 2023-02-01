<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $db = DB::table('user')
        ->join('level_user', 'user.id_level', '=', 'level_user.id_level')
        ->select('level_user.*', 'user.*')
        ->get();
        $jumlahbaris = 5;
        if(strlen($katakunci)){
            $data = user::where('nama_user','like',"%$katakunci%")
            ->orWhere('id_level','like',"%$katakunci%")
            ->orWhere('username','like',"%$katakunci%")
            ->paginate($jumlahbaris);
        }else{
            $data = user::orderBy('id_user', 'desc')->paginate($jumlahbaris);
        }
        return view('user.index', compact('db'))->with('user', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $create = DB::table('level_user')->get();
        return view('user.create', compact('create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        Session::flash('nama_user', $request->nama_user);
        Session::flash('id_level', $request->id_level);
        Session::flash('username', $request->username);
        Session::flash('password', $request->password);
        
        $request->validate([           
            'nama_user' => 'required|unique:user,nama_user',
            'id_level' => 'required',            
            'username' => 'required|unique:user,username',
            'password' => 'required',
        ],[
            'nama_user.required' => 'Nama User Wajib di Isi',
            'nama_user.unique' => 'Nama User Sudah di Isi',
            'id_level.required' => 'Nama Level Wajib di Isi',
            'username.required' => 'Username Wajib di Isi',
            'username.unique' => 'Username Sudah di Isi',
            'password.required' => 'Password Wajib di Isi',
        ]);
        $Array = DB::select('SELECT new_id_user() AS id_user');
        $kode_baru = $Array[0]->id_user;
        user::insert([
            'id_user' => $kode_baru,
            'nama_user' => $request->input('nama_user'),
            'id_level' => $request->input('id_level'),
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ]);
        return redirect()->to('user')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = DB::table('level_user')->get();
        $data = user::where('id_user', $id)->first();
        return view('user.edit', compact('edit'))->with('edit_user', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_user' => 'required',
            'id_level' => 'required',
            'username' => 'required',
            'password' => 'required',
        ],[
            'nama_user.required' => 'Nama User Wajib di Isi',
            'id_level.required' => 'Nama Level Wajib di Isi',
            'username.required' => 'Username Wajib di Isi',
            'password.required' => 'Password Wajib di Isi',        
        ]);
        $data = [
            'nama_user'=>$request->nama_user,
            'id_level'=>$request->id_level,
            'username'=>$request->username,
            'password'=>$request->password,
        ];
        user::where('id_user', $id)->update($data);
        return redirect()->to('user')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        user::where('id_user', $id)->delete();
        return redirect()->to('user')->with('success', 'Berhasil menghapus data');
    }
}
