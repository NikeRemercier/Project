<?php

namespace App\Http\Controllers;

use App\Models\level_user;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class level_userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $db = DB::table('level_user')->get();
        $jumlahbaris = 5;
        if(strlen($katakunci)){
            $data = level_user::where('nama_level','like',"%$katakunci%")
            ->paginate($jumlahbaris);

        }else{
            $data = level_user::orderBy('id_level', 'desc')->paginate($jumlahbaris);
        }
        return view('level_user.index', compact('db'))->with('level_user', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('level_user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama_level', $request->nama_level);
        
        $request->validate([
            'nama_level' => 'required|unique:level_user,nama_level',
        ],[
            'nama_level.required' => 'Nama Level Wajib di Isi',
            'nama_level.unique' => 'Nama Level Sudah di Isi', 
        ]);
        $Array = DB::select('SELECT new_id_level_user() AS id_level');
        $kode_baru = $Array[0]->id_level;
        level_user::insert([
            'id_level' => $kode_baru,
            'nama_level' => $request->input('nama_level'),
        ]);
        return redirect()->to('level_user')->with('success', 'Berhasil menambahkan data');
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
        $data = level_user::where('id_level', $id)->first();
        return view('level_user.edit')->with('edit_level_user', $data);
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
            'nama_level' => 'required',
        ],[
            'nama_level.required' => 'Nama Level Wajib di Isi', 
        ]);
        $data = [
            'nama_level'=>$request->nama_level,
        ];
        level_user::where('id_level', $id)->update($data);
        return redirect()->to('level_user')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        level_user::where('id_level', $id)->delete();
        return redirect()->to('level_user')->with('success', 'Berhasil menghapus data');
    }
}
