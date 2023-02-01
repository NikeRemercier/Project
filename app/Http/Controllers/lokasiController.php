<?php

namespace App\Http\Controllers;

use App\Models\lokasi;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class lokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $db = DB::table('lokasi')
        ->join('user', 'user.id_user', '=', 'lokasi.id_user')
        ->select('lokasi.*', 'user.*')
        ->get();
        $jumlahbaris = 5;
        if(strlen($katakunci)){
            $data = lokasi::where('nama_lokasi','like',"%$katakunci%")
            ->orWhere('id_user','like',"%$katakunci%")
            ->orWhere('keterangan','like',"%$katakunci%")
            ->paginate($jumlahbaris);
        }else{
            $data = lokasi::orderBy('id_lokasi', 'desc')->paginate($jumlahbaris);
        }
        return view('lokasi.index', compact('db'))->with('lokasi', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $create = DB::table('user')->get();
        return view('lokasi.create', compact('create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama_lokasi', $request->nama_lokasi);
        Session::flash('id_user', $request->id_user);
        Session::flash('keterangan', $request->keterangan);
        
        $request->validate([           
            'nama_lokasi' => 'required|unique:lokasi,nama_lokasi',
            'id_user' => 'required',            
            'keterangan' => 'required|unique:lokasi,keterangan',
        ],[
            'nama_lokasi.required' => 'Nama Lokasi Wajib di Isi',
            'nama_lokasi.unique' => 'Nama Lokasi Sudah di Isi',
            'id_user.required' => 'Nama Penanggung Jawab Wajib di Isi',
            'keterangan.required' => 'Keterangan Wajib di Isi',
            'keterangan.unique' => 'Keterangan Sudah di Isi',
        ]);
        $Array = DB::select('SELECT new_id_lokasi() AS id_lokasi');
        $kode_baru = $Array[0]->id_lokasi;
        lokasi::insert([
            'id_lokasi' => $kode_baru,
            'nama_lokasi' => $request->input('nama_lokasi'),
            'id_user' => $request->input('id_user'),
            'keterangan' => $request->input('keterangan')
        ]);
        return redirect()->to('lokasi')->with('success', 'Berhasil menambahkan data');
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
        $edit = DB::table('user')->get();
        $data = lokasi::where('id_lokasi', $id)->first();
        return view('lokasi.edit', compact('edit'))->with('edit_lokasi', $data);
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
            'nama_lokasi' => 'required',
            'id_user' => 'required',
            'keterangan' => 'required',
        ],[
            'nama_lokasi.required' => 'Nama Lokasi Wajib di Isi',
            'id_user.required' => 'Nama Penanggung Jawab Wajib di Isi',
            'keterangan.required' => 'Keterangan Wajib di Isi',        
        ]);
        $data = [
            'nama_lokasi'=>$request->nama_lokasi,
            'id_user'=>$request->id_user,
            'keterangan'=>$request->keterangan,
        ];
        lokasi::where('id_lokasi', $id)->update($data);
        return redirect()->to('lokasi')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        lokasi::where('id_lokasi', $id)->delete();
        return redirect()->to('lokasi')->with('success', 'Berhasil menghapus data');
    }
}
