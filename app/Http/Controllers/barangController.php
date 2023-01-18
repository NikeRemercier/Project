<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;
        if(strlen($katakunci)){
            $data = barang::where('id_barang','like',"%$katakunci%")
            ->orWhere('nama_barang','like',"%$katakunci%")
            ->orWhere('merk','like',"%$katakunci%")
            ->paginate($jumlahbaris);

        }else{
            $data = barang::orderBy('nama_barang', 'desc')->paginate($jumlahbaris);
        }
        return view('barang.index')->with('data1', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('id_barang', $request->id_barang);
        Session::flash('nama_barang', $request->nama_barang);
        Session::flash('merk', $request->merk);
        Session::flash('total_barang', $request->total_barang);
        
        $request->validate([
            'id_barang' => 'required|unique:barang,id_barang',
            'nama_barang' => 'required',
            'merk' => 'required',
            'total_barang' => 'required'
        ],[
            'id_barang.required' => 'ID Wajib di Isi',
            'id_barang.unique' => 'ID Sudah di Isi',
            'nama_barang.required' => 'Nama Wajib di Isi',
            'merk.required' => 'Merk Wajib di Isi',
            'total_barang.required' => 'Jumlah Wajib di Isi', 
        ]);
        $data = [
            'id_barang'=>$request->id_barang,
            'nama_barang'=>$request->nama_barang,
            'merk'=>$request->merk,
            'total_barang'=>$request->total_barang,
        ];
        barang::create($data);
        return redirect()->to('barang')->with('success', 'Berhasil menambahkan data');
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
        $data = barang::where('id_barang', $id)->first();
        return view('barang.edit')->with('data', $data);
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
            'nama_barang' => 'required',
            'merk' => 'required',
            'total_barang' => 'required'
        ],[
            'nama_barang.required' => 'Nama Wajib di Isi',
            'merk.required' => 'Merk Wajib di Isi',
            'total_barang.required' => 'Total Wajib di Isi', 
        ]);
        $data = [
            'nama_barang'=>$request->nama_barang,
            'merk'=>$request->merk,
            'total_barang'=>$request->total_barang,
        ];
        barang::where('id_barang', $id)->update($data);
        return redirect()->to('barang')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        barang::where('id_barang', $id)->delete();
        return redirect()->to('barang')->with('success', 'Berhasil menghapus data');
    }
}
