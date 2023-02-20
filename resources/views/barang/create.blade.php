@extends('layout.main')

@section('konten')
<form action='{{ url('barang') }}' method='post'>
@csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('barang') }}" class="btn btn-secondary bi bi-back"> Kembali</a>
        <div class="mb-3 row">
            <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value='{{ Session::get('nama_barang') }}' name='nama_barang' id="nama_barang" placeholder="Masukan Nama Barang" autofocus>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="merk" class="col-sm-2 col-form-label">Merk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value='{{ Session::get('merk') }}' name='merk' id="merk" placeholder="Masukan Merk Barang">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="total_barang" class="col-sm-2 col-form-label">Total Barang</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" value='{{ Session::get('total_barang') }}' name='total barang' id="total barang" placeholder="Masukan Total Barang">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary bi bi-save" name="submit"> Simpan</button></div>
        </div>
    </div>
</form>
@endsection