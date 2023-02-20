@extends('layout.main')

@section('konten')
<form action='{{ url('detail_barang') }}' method='POST' enctype="multipart/form-data">
@csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('detail_barang') }}" class="btn btn-secondary bi bi-back"> Kembali</a>
        <div class="mb-3 row">
            <label for="id_barang" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="id_barang" id="id_barang">
                    <option disabled selected>Pilih Barang</option>
                        @foreach($barang as $item)
                            <option value="{{ $item->id_barang }}" {{old('id_barang') == $item->id_barang ? 'selected' : null}}>{{ $item->nama_barang }}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_lokasi" class="col-sm-2 col-form-label">Nama Lokasi</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="id_lokasi" id="id_lokasi">
                    <option disabled selected>Pilih Lokasi</option>
                        @foreach($lokasi as $item)
                            <option value="{{ $item->id_lokasi }}" {{old('id_lokasi') == $item->id_lokasi ? 'selected' : null}}>{{ $item->nama_lokasi }}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_sumber" class="col-sm-2 col-form-label">Nama Sumber</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="id_sumber" id="id_sumber">
                    <option disabled selected>Pilih Sumber</option>
                        @foreach($sumber_dana as $item)
                            <option value="{{ $item->id_sumber }}" {{old('id_sumber') == $item->id_sumber ? 'selected' : null}}>{{ $item->nama_sumber }}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="foto_barang" class="col-sm-2 col-form-label">Foto Barang</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name='foto_barang' id="foto_barang">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kondisi" class="col-sm-2 col-form-label">Kondisi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value='{{ Session::get('kondisi') }}' name='kondisi' id="kondisi">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tahun_pembelian" class="col-sm-2 col-form-label">Tahun Pembelian</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" value='{{ Session::get('tahun_pembelian') }}' name='tahun_pembelian' id="tahun_pembelian">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary bi bi-save" name="submit"> Simpan</button></div>
        </div>
    </div>
</form>
@endsection