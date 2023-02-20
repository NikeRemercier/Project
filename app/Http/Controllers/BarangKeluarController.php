<?php

namespace App\Http\Controllers;

use App\Models\barang_keluar;
use App\Models\view_join_delete_detail_barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BarangKeluarController extends Controller
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
            $data = view_join_delete_detail_barang::where('nama_lokasi','like',"%$katakunci%")
            ->orWhere('nama_barang','like',"%$katakunci%")
            ->orWhere('nama_sumber','like',"%$katakunci%")
            ->paginate($jumlahbaris);
        }else{
            $data = view_join_delete_detail_barang::orderBy('id_keluar', 'desc')->paginate($jumlahbaris);
        }
        return view('barang_keluar.index')->with('barang_keluar', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = barang_keluar::where('id_keluar', $id)->first();
        File::delete(public_path('gambar').'/'.$data->foto_barang);

        barang_keluar::where('id_keluar', $id)->delete();
        return redirect()->to('barang_keluar')->with('success', 'Berhasil menghapus data');
    }
}
