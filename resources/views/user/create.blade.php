@extends('layout.main')

@section('konten')
<form action='{{ url('user') }}' method='post'>
@csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('user') }}" class="btn btn-secondary bi bi-back"> Kembali</a>
        <div class="mb-3 row">
            <label for="nama_user" class="col-sm-2 col-form-label">Nama User</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value='{{ Session::get('nama_user') }}' name='nama_user' id="nama_user" autofocus placeholder="Masukan Nama User">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_level" class="col-sm-2 col-form-label">Nama Level</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="id_level" id="id_level">
                    <option disabled selected>Pilih Level</option>
                        @foreach($level_user as $item)
                            <option value="{{ $item->id_level }}" {{old('id_level') == $item->id_level ? 'selected' : null}}>{{ $item->nama_level }}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value='{{ Session::get('username') }}' name='username' id="username" placeholder="Masukan Username">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value='{{ Session::get('password') }}' name='password' id="password" placeholder="Masukan Password">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary bi bi-save" name="submit"> Simpan</button></div>
        </div>
    </div>
</form>
@endsection