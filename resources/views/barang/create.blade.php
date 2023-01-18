@extends('layout.main')
<!-- START FORM -->
@section('konten')

<form action='{{ url('barang') }}' method='post'>
@csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('barang') }}" class="btn btn-secondary"><< Kembali</a>
        <div class="mb-3 row">
            <label for="id_barang" class="col-sm-2 col-form-label">ID Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value='{{ Session::get('id_barang') }}' name='id_barang' id="id_barang">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value='{{ Session::get('nama_barang') }}' name='nama_barang' id="nama_barang">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="merk" class="col-sm-2 col-form-label">Merk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value='{{ Session::get('merk') }}' name='merk' id="merk">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="total_barang" class="col-sm-2 col-form-label">Total Barang</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" value='{{ Session::get('total_barang') }}' name='total barang' id="total barang">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
@endsection
<!-- AKHIR FORM -->