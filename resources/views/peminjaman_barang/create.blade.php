@extends('layout.main')

@section('konten')
<form action='{{ url('peminjaman_barang') }}' method='POST'>
@csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('peminjaman_barang') }}" class="btn btn-secondary bi bi-back"> Kembali</a>
        <div class="mb-3 row">
            <label for="kode_barang" class="col-sm-2 col-form-label">Kode Barang</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="kode_barang" id="kode_barang">
                    <option disabled selected>Pilih Kode Barang</option>
                        @foreach($detail_barang as $item)
                            <option value="{{ $item->kode_barang }}" {{old('kode_barang') == $item->kode_barang ? 'selected' : null}}>{{ $item->kode_barang }}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_user" class="col-sm-2 col-form-label">Nama User</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="id_user" id="id_user">
                    <option disabled selected>Pilih User</option>
                        @foreach($user as $item)
                            <option value="{{ $item->id_user }}" {{old('id_user') == $item->id_user ? 'selected' : null}}>{{ $item->nama_user }}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tanggal_peminjaman" class="col-sm-2 col-form-label">Tanggal Peminjaman</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" value='{{ Session::get('tanggal_peminjaman') }}' name='tanggal_peminjaman' id="tanggal_peminjaman">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tanggal_kembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" value='{{ Session::get('tanggal_kembali') }}' name='tanggal_kembali' id="tanggal_kembali">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary bi bi-save" name="submit"> Simpan</button></div>
        </div>
    </div>
</form>
@endsection