<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class supplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $db = DB::table('supplier')->get();
        $jumlahbaris = 5;
        if(strlen($katakunci)){
            $data = supplier::where('nama_supplier','like',"%$katakunci%")
            ->orWhere('alamat_supplier','like',"%$katakunci%")
            ->orWhere('telp_supplier','like',"%$katakunci%")
            ->paginate($jumlahbaris);

        }else{
            $data = supplier::orderBy('id_supplier', 'desc')->paginate($jumlahbaris);
        }
        return view('supplier.index', compact('db'))->with('supplier', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama_supplier', $request->nama_supplier);
        Session::flash('alamat_supplier', $request->alamat_supplier);
        Session::flash('telp_supplier', $request->telp_supplier);
        
        $request->validate([
            'nama_supplier' => 'required',
            'alamat_supplier' => 'required|unique:supplier,alamat_supplier',
            'telp_supplier' => 'required|unique:supplier,telp_supplier',
        ],[
            'nama_supplier.required' => 'Nama Supplier Wajib di Isi',
            'alamat_supplier.required' => 'Alamat Supplier Wajib di Isi',
            'alamat_supplier.unique' => 'Alamat Supplier Sudah di Isi',
            'telp_supplier.required' => 'Telepon Supplier Wajib di Isi',
            'telp_supplier.unique' => 'Telepon Supplier Sudah di Isi', 
        ]);
        $Array = DB::select('SELECT new_id_supplier() AS id_supplier');
        $kode_baru = $Array[0]->id_supplier;
        supplier::insert([
            'id_supplier' => $kode_baru,
            'nama_supplier' => $request->input('nama_supplier'),
            'alamat_supplier' => $request->input('alamat_supplier'),
            'telp_supplier' => $request->input('telp_supplier')
        ]);
        return redirect()->to('supplier')->with('success', 'Berhasil menambahkan data');
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
        $data = supplier::where('id_supplier', $id)->first();
        return view('supplier.edit')->with('edit_supplier', $data);
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
            'nama_supplier' => 'required',
            'alamat_supplier' => 'required',
            'telp_supplier' => 'required'
        ],[
            'nama_supplier.required' => 'Nama Supplier Wajib di Isi',
            'alamat_supplier.required' => 'Alamat Suppplier Wajib di Isi',
            'telp_supplier.required' => 'Telepon Supplier Wajib di Isi', 
        ]);
        $data = [
            'nama_supplier'=>$request->nama_supplier,
            'alamat_supplier'=>$request->alamat_supplier,
            'telp_supplier'=>$request->telp_supplier,
        ];
        supplier::where('id_supplier', $id)->update($data);
        return redirect()->to('supplier')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        supplier::where('id_supplier', $id)->delete();
        return redirect()->to('supplier')->with('success', 'Berhasil menghapus data');
    }
}