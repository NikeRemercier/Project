<?php

namespace App\Http\Controllers;

use App\Models\detail_barang;
use App\Models\view_join_detail_barang;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DetailBarangController extends Controller
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
            $data = view_join_detail_barang::where('nama_lokasi','like',"%$katakunci%")
            ->orWhere('nama_barang','like',"%$katakunci%")
            ->orWhere('nama_sumber','like',"%$katakunci%")
            ->paginate($jumlahbaris);
        }else{
            $data = view_join_detail_barang::orderBy('kode_barang', 'desc')->paginate($jumlahbaris);
        }
        return view('detail_barang.index')->with('detail_barang', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = DB::table('barang')->get();
        $lokasi = DB::table('lokasi')->get();
        $sumber_dana = DB::table('sumber_dana')->get();
        return view('detail_barang.create', compact('barang','lokasi','sumber_dana'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('kondisi', $request->kondisi);
        Session::flash('tahun_pembelian', $request->tahun_pembelian);
        
        $request->validate([           
            'id_barang' => 'required',
            'id_lokasi' => 'required',            
            'id_sumber' => 'required',
            'foto_barang' => 'required|mimes:jpeg,jpg,png,gif',
            'kondisi' => 'required',
            'tahun_pembelian' => 'required',
        ],[
            'id_barang.required' => 'Nama Barang Wajib di Isi',
            'id_lokasi.required' => 'Nama Lokasi Wajib di Isi',
            'id_sumber.required' => 'Nama Sumber Wajib di Isi',
            'foto_barang.required' => 'Foto Barang Wajib di Isi',
            'foto_barang.mimes' => 'Ekstensi Foto Barang Harus jpeg, jpg, png, dan gif',            
            'kondisi.required' => 'Kondisi Barang Wajib di Isi',
            'tahun_pembelian.required' => 'Tahun Pembelian Wajib di Isi',
        ]);

        $foto = $request->file('foto_barang');
        $foto_ekstensi = $foto->extension();
        $foto_nama = date('ymdhis'). '.' . $foto_ekstensi;
        $foto->move(public_path('gambar'),$foto_nama);
        
        $Array = DB::select('SELECT new_id_detail_barang() AS kode_barang');
        $kode_baru = $Array[0]->kode_barang;
        detail_barang::insert([
            'kode_barang' => $kode_baru,
            'id_barang' => $request->input('id_barang'),
            'id_lokasi' => $request->input('id_lokasi'),
            'id_sumber' => $request->input('id_sumber'),
            'foto_barang' => $foto_nama,
            'kondisi' => $request->input('kondisi'),
            'tahun_pembelian' => $request->input('tahun_pembelian')
        ]);
        return redirect()->to('detail_barang')->with('success', 'Berhasil menambahkan data');
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
        $barang = DB::table('barang')->get();
        $lokasi = DB::table('lokasi')->get();
        $sumber_dana = DB::table('sumber_dana')->get();
        $data = detail_barang::where('kode_barang', $id)->first();
        return view('detail_barang.edit', compact('barang','lokasi','sumber_dana'))->with('edit_detail_barang', $data);
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
            'id_barang' => 'required',
            'id_lokasi' => 'required',            
            'id_sumber' => 'required',
            'kondisi' => 'required',
            'tahun_pembelian' => 'required',
        ],[
            'id_barang.required' => 'Nama Barang Wajib di Isi',
            'id_lokasi.required' => 'Nama Lokasi Wajib di Isi',
            'id_sumber.required' => 'Nama Sumber Wajib di Isi',
            'kondisi.required' => 'Kondisi Barang Wajib di Isi',
            'tahun_pembelian.required' => 'Tahun Pembelian Wajib di Isi',     
        ]);
        $data = [
            'id_barang'=>$request->id_barang,
            'id_lokasi'=>$request->id_lokasi,
            'id_sumber'=>$request->id_sumber,
            'kondisi'=>$request->kondisi,
            'tahun_pembelian'=>$request->tahun_pembelian,

        ];

        if (!is_null($request->foto_barang)) {
            $request->validate([
                'foto_barang' => 'mimes:jpeg,jpg,png,gif',
            ],[
                'foto_barang.mimes' => 'Ekstensi Foto Barang Harus jpeg, jpg, png, dan gif',            
            ]);

            $foto = $request->file('foto_barang');
            $foto_ekstensi = $foto->extension();
            $foto_nama = date('ymdhis'). '.' . $foto_ekstensi;
            $foto->move(public_path('gambar'),$foto_nama);

            $data_foto = detail_barang::where('kode_barang', $id)->first();
            File::delete(public_path('gambar').'/'.$data_foto->foto_barang);
            $data['foto_barang'] = $foto_nama; 
        }

        detail_barang::where('kode_barang', $id)->update($data);
        return redirect()->to('detail_barang')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $data = detail_barang::where('kode_barang', $id)->first();
        // File::delete(public_path('gambar').'/'.$data->foto_barang);
        
        detail_barang::where('kode_barang', $id)->delete();
        return redirect()->to('detail_barang')->with('success', 'Berhasil menghapus data');
    }
}
