@extends('layout.main')
@section('konten')
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{ route('register.action') }}">
                @csrf
                <div class="mb-3">
                    <label for="">Name <span class="text-danger"></span></label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="">Username <span class="text-danger"></span></label>
                    <input class="form-control" type="text" name="username" value="{{ old('username') }}">
                </div>
                <div class="mb-3">
                    <label for="">Password <span class="text-danger"></span></label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="">Password Confirmation<span class="text-danger"></span></label>
                    <input class="form-control" type="password" name="password_confirmation">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Register</button>
                    <a href="{{ route('home') }}" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection