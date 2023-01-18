@extends('layout.main')
@section('konten')
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{ route('login.action') }}">
                @csrf
                <div class="mb-3">
                    <label for="">Username <span class="text-danger"></span></label>
                    <input class="form-control" type="text" name="username" value="{{ old('username') }}">
                </div>
                <div class="mb-3">
                    <label for="">Password <span class="text-danger"></span></label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Login</button>
                    <a href="{{ route('home') }}" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection