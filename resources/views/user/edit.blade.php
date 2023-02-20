@extends('layout.main')
<!-- START FORM -->
@section('konten')

<form action='{{ url('user/'.$edit_user->id_user) }}' method='post'>
@csrf
@method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('user') }}" class="btn btn-secondary bi bi-back"> Kembali</a>
        <div class="mb-3 row">
            <label for="nama_user" class="col-sm-2 col-form-label">Nama User</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value='{{ $edit_user->nama_user }}' name='nama_user' id="nama_user">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_level" class="col-sm-2 col-form-label">Nama Level</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="id_level" id="id_level">
                    <option disabled selected>Pilih Level</option>
                        @foreach($level_user as $item)
                            <option value="{{ $item->id_level }}">{{ $item->nama_level }}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value='{{ $edit_user->username }}' name='username' id="username">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value='{{ $edit_user->password }}' name='password' id="password">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary bi bi-save" name="submit"> Simpan</button></div>
        </div>
    </div>
</form>
@endsection