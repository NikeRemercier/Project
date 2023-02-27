<?php

namespace App\Http\Controllers;

use App\Models\peminjaman_barang;
use App\Models\view_join_peminjaman_barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PeminjamanBarangController extends Controller
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
            $data = view_join_peminjaman_barang::where('kode_barang','like',"%$katakunci%")
            ->orWhere('nama_user','like',"%$katakunci%")
            ->paginate($jumlahbaris);
        }else{
            $data = view_join_peminjaman_barang::orderBy('id_peminjam', 'desc')->paginate($jumlahbaris);
        }
        return view('peminjaman_barang.index')->with('peminjaman_barang', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = DB::table('user')->get();
        $lokasi = DB::table('lokasi')->get();
        return view('peminjaman_barang.create', compact('user','lokasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('tanggal_peminjaman', $request->tanggal_peminjaman);
        Session::flash('tanggal_kembali', $request->tanggal_kembali);
        
        $request->validate([           
            'kode_barang' => 'required',
            'id_user' => 'required',     
            'id_lokasi' => 'required',       
            'tanggal_peminjaman' => 'required',
            'tanggal_kembali' => 'required',
        ],[
            'kode_barang.required' => 'Kode Barang Wajib di Isi',
            'id_user.required' => 'Nama User Wajib di Isi',
            'id_lokasi.required' => 'Nama Lokasi Wajib di Isi',
            'tanggal_peminjaman.required' => 'Tanggal Peminjaman Wajib di Isi',
            'tanggal_kembali.required' => 'Tanggal Kembali Wajib di Isi',            
        ]);

        $Array = DB::select('SELECT new_id_peminjaman_barang() AS id_peminjam');
        $kode_baru = $Array[0]->id_peminjam;
        peminjaman_barang::insert([
            'id_peminjam' => $kode_baru,
            'kode_barang' => $request->input('kode_barang'),
            'id_user' => $request->input('id_user'),
            'id_lokasi' => $request->input('id_lokasi'),
            'tanggal_peminjaman' => $request->input('tanggal_peminjaman'),
            'tanggal_kembali' => $request->input('tanggal_kembali'),
        ]);
        return redirect()->to('peminjaman_barang')->with('success', 'Berhasil menambahkan data');
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
        $detail_barang = DB::table('detail_barang')->get();
        $user = DB::table('user')->get();
        $lokasi = DB::table('lokasi')->get();
        $data = peminjaman_barang::where('id_peminjam', $id)->first();
        return view('peminjaman_barang.edit', compact('detail_barang', 'user','lokasi'))->with('edit_peminjaman_barang', $data);
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
            'kode_barang' => 'required',
            'id_user' => 'required',
            'id_lokasi' => 'required',       
            'tanggal_peminjaman' => 'required',
            'tanggal_kembali' => 'required',
        ],[
            'kode_barang.required' => 'Nama User Wajib di Isi',
            'id_user.required' => 'Nama Level Wajib di Isi',
            'id_lokasi.required' => 'Nama Lokasi Wajib di Isi',
            'tanggal_peminjaman.required' => 'Tanggal Peminjaman Wajib di Isi',
            'tanggal_kembali.required' => 'Tanggal Kembali Wajib di Isi',        
        ]);
        $data = [
            'kode_barang'=>$request->kode_barang,
            'id_user'=>$request->id_user,
            'id_lokasi' =>$request->id_lokasi,       
            'tanggal_peminjaman'=>$request->tanggal_peminjaman,
            'tanggal_kembali'=>$request->tanggal_kembali,
        ];
        peminjaman_barang::where('id_peminjam', $id)->update($data);
        return redirect()->to('peminjaman_barang')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        peminjaman_barang::where('id_peminjam', $id)->delete();
        return redirect()->to('peminjaman_barang')->with('success', 'Berhasil menghapus data');
    }
}
