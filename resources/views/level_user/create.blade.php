@extends('layout.main')

@section('konten')
<form action='{{ url('level_user') }}' method='post'>
@csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('level_user') }}" class="btn btn-secondary bi bi-back"> Kembali</a>
        <div class="mb-3 row">
            <label for="nama_level" class="col-sm-2 col-form-label">Nama Level</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value='{{ Session::get('nama_level') }}' name='nama_level' id="nama_level">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary bi bi-save" name="submit"> Simpan</button></div>
        </div>
    </div>
</form>
@endsection
