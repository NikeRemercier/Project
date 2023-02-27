<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
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
            $data = barang::where('nama_barang','like',"%$katakunci%")
            ->orWhere('merk','like',"%$katakunci%")
            ->orWhere('spesifikasi','like',"%$katakunci%")
            ->paginate($jumlahbaris);
        }else{
            $data = barang::orderBy('id_barang', 'desc')->paginate($jumlahbaris);
        }
        $lokasi = collect(DB::select("SELECT * FROM jumlah_lokasi"))->firstOrFail()->jml_lokasi;
        $sumber_dana = collect(DB::select("SELECT * FROM jumlah_sumber_dana"))->firstOrFail()->jml_sumber_dana;
        $supplier = collect(DB::select("SELECT * FROM jumlah_supplier"))->firstOrFail()->jml_supplier;
        return view('barang.index', compact('lokasi', 'sumber_dana', 'supplier'))->with('barang', $data);
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
        Session::flash('nama_barang', $request->nama_barang);
        Session::flash('merk', $request->merk);
        Session::flash('spesifikasi', $request->spesifikasi);
        Session::flash('total_barang', $request->total_barang);
        
        $request->validate([
            'nama_barang' => 'required',
            'merk' => 'required',
            'spesifikasi' => 'required',
            'total_barang' => 'required',
        ],[
            'nama_barang.required' => 'Nama Barang Wajib di Isi',
            'merk.required' => 'Merk Barang Wajib di Isi',
            'spesifikasi.required' => 'Spesifikasi Barang Wajib di Isi',
            'total_barang.required' => 'Jumlah Barang Wajib di Isi', 
        ]);
            $Array = DB::select('SELECT new_id_barang() AS id_barang');
            $kode_baru = $Array[0]->id_barang;
            barang::insert([
                'id_barang' => $kode_baru,
                'nama_barang' => $request->input('nama_barang'),
                'merk' => $request->input('merk'),
                'spesifikasi' => $request->input('spesifikasi'),
                'total_barang' => $request->input('total_barang')
            ]);
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
        return view('barang.edit')->with('edit_barang', $data);
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
            'spesifikasi' => 'required',
            'total_barang' => 'required'
        ],[
            'nama_barang.required' => 'Nama Wajib di Isi',
            'merk.required' => 'Merk Wajib di Isi',
            'spesifikasi.required' => 'Spesifikasi Barang Wajib di Isi',
            'total_barang.required' => 'Total Wajib di Isi', 
        ]);
        $data = [
            'nama_barang'=>$request->nama_barang,
            'merk'=>$request->merk,
            'spesifikasi'=>$request->spesifikasi,
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