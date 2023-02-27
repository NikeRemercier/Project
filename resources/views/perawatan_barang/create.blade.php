@extends('layout.main')

@section('konten')
<form action='{{ url('perawatan_barang') }}' method='POST'>
@csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('perawatan_barang') }}" class="btn btn-secondary bi bi-back"> Kembali</a>
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
            <label for="id_user" class="col-sm-2 col-form-label">Nama Perawat</label>
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
            <label for="tanggal_perawatan" class="col-sm-2 col-form-label">Tanggal Perawatan</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" value='{{ Session::get('tanggal_perawatan') }}' name='tanggal_perawatan' id="tanggal_perawatan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kegiatan_perawatan" class="col-sm-2 col-form-label">Kegiatan Perawatan</label>
            <div class="col-sm-10">
                <textarea class="form-control" value='{{ Session::get('kegiatan_perawatan') }}' name='kegiatan_perawatan' id="kegiatan_perawatan" rows="2"></textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
                <textarea class="form-control" value='{{ Session::get('keterangan') }}' name='keterangan' id="keterangan" rows="2"></textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary bi bi-save" name="submit"> Simpan</button></div>
        </div>
    </div>
</form>
@endsection