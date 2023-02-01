<?php

namespace App\Http\Controllers;

use App\Models\sumber_dana;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sumber_danaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $db = DB::table('sumber_dana')->get();
        $jumlahbaris = 5;
        if(strlen($katakunci)){
            $data = sumber_dana::where('nama_sumber','like',"%$katakunci%")
            ->orWhere('keterangan','like',"%$katakunci%")
            ->paginate($jumlahbaris);

        }else{
            $data = sumber_dana::orderBy('id_sumber', 'desc')->paginate($jumlahbaris);
        }
        return view('sumber_dana.index', compact('db'))->with('sumber_dana', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sumber_dana.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama_sumber', $request->nama_sumber);
        Session::flash('keterangan', $request->keterangan);
        
        $request->validate([
            'nama_sumber' => 'required|unique:sumber_dana,nama_sumber',
            'keterangan' => 'required',
        ],[
            'nama_sumber.required' => 'Nama Sumber Wajib di Isi',
            'nama_sumber.unique' => 'Nama Sumber Sudah di Isi',
            'keterangan.required' => 'Keterangan Wajib di Isi', 
        ]);
        $Array = DB::select('SELECT new_id_sumber_dana() AS id_sumber');
        $kode_baru = $Array[0]->id_sumber;
        sumber_dana::insert([
            'id_sumber' => $kode_baru,
            'nama_sumber' => $request->input('nama_sumber'),
            'keterangan' => $request->input('keterangan'),
        ]);
        return redirect()->to('sumber_dana')->with('success', 'Berhasil menambahkan data');
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
        $data = sumber_dana::where('id_sumber', $id)->first();
        return view('sumber_dana.edit')->with('edit_sumber_dana', $data);
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
            'nama_sumber' => 'required',
            'keterangan' => 'required',
        ],[
            'nama_sumber.required' => 'Nama Sumber Wajib di Isi',
            'keterangan.required' => 'Keterangan Wajib di Isi', 
        ]);
        $data = [
            'nama_sumber'=>$request->nama_sumber,
            'keterangan'=>$request->keterangan,
        ];
        sumber_dana::where('id_sumber', $id)->update($data);
        return redirect()->to('sumber_dana')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        sumber_dana::where('id_sumber', $id)->delete();
        return redirect()->to('sumber_dana')->with('success', 'Berhasil menghapus data');
    }
}
