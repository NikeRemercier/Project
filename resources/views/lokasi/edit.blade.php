@extends('layout.main')
<!-- START FORM -->
@section('konten')

<form action='{{ url('lokasi/'.$edit_lokasi->id_lokasi) }}' method='post'>
@csrf
@method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('lokasi') }}" class="btn btn-secondary bi bi-back"> Kembali</a>
        <div class="mb-3 row">
            <label for="nama_lokasi" class="col-sm-2 col-form-label">Nama Lokasi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value='{{ $edit_lokasi->nama_lokasi }}' name='nama_lokasi' id="nama_lokasi">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_user" class="col-sm-2 col-form-label">Penanggung Jawab</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="id_user" id="id_user">
                    <option disabled selected>Pilih User</option>
                        @foreach($edit as $item)
                            <option value="{{ $item->id_user }}">{{ $item->nama_user }}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value='{{ $edit_lokasi->keterangan }}' name='keterangan' id="keterangan">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary bi bi-save" name="submit"> Simpan</button></div>
        </div>
    </div>
</form>
@endsection