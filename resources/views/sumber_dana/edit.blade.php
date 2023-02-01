@extends('layout.main')
<!-- START FORM -->
@section('konten')

<form action='{{ url('sumber_dana/'.$edit_sumber_dana->id_sumber) }}' method='post'>
@csrf
@method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('sumber_dana') }}" class="btn btn-secondary bi bi-back"> Kembali</a>
        <div class="mb-3 row">
            <label for="nama_sumber" class="col-sm-2 col-form-label">Nama Sumber</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value='{{ $edit_sumber_dana->nama_sumber }}' name='nama_sumber' id="nama_sumber">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value='{{ $edit_sumber_dana->keterangan }}' name='keterangan' id="keterangan">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary bi bi-save" name="submit"> Simpan</button></div>
        </div>
    </div>
</form>
@endsection