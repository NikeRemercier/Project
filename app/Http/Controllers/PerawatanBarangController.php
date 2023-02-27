<?php

namespace App\Http\Controllers;

use App\Models\perawatan_barang;
use App\Models\view_join_perawatan_barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PerawatanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if(strlen($katakunci)){
            $data = view_join_perawatan_barang::where('kode_barang','like',"%$katakunci%")
            ->orWhere('nama_user','like',"%$katakunci%")
            ->paginate($jumlahbaris);
        }else{
            $data = view_join_perawatan_barang::orderBy('id_perawat', 'desc')->paginate($jumlahbaris);
        }
        return view('perawatan_barang.index')->with('perawatan_barang', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = DB::table('user')->get();
        $detail_barang = DB::table('detail_barang')->get();
        return view('perawatan_barang.create', compact('user','detail_barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('tanggal_perawatan', $request->tanggal_perawatan);
        Session::flash('kegiatan_perawatan', $request->kegiatan_perawatan);
        Session::flash('keterangan', $request->keterangan);
        
        $request->validate([           
            'kode_barang' => 'required',
            'id_user' => 'required',            
            'tanggal_perawatan' => 'required',
            'kegiatan_perawatan' => 'required',
            'keterangan' => 'required',
        ],[
            'kode_barang.required' => 'Kode Barang Wajib di Isi',
            'id_user.required' => 'Nama User Wajib di Isi',
            'kegiatan_perawatan' => 'Kegiatan Perawatan Wajib di Isi',
            'tanggal_perawatan.required' => 'Tanggal Perawatan Wajib di Isi',
            'keterangan.required' => 'Keterangan Wajib di Isi',            
        ]);

        $Array = DB::select('SELECT new_id_perawatan_barang() AS id_perawat');
        $kode_baru = $Array[0]->id_perawat;
        perawatan_barang::insert([
            'id_perawat' => $kode_baru,
            'kode_barang' => $request->input('kode_barang'),
            'id_user' => $request->input('id_user'),
            'tanggal_perawatan' => $request->input('tanggal_perawatan'),
            'kegiatan_perawatan' => $request->input('kegiatan_perawatan'),
            'keterangan' => $request->input('keterangan'),
        ]);
        return redirect()->to('perawatan_barang')->with('success', 'Berhasil menambahkan data');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
