@extends('layout.main')

@section('konten')
@csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('barang') }}" class="btn btn-secondary bi bi-back"> Kembali</a>
        <h1>{{ $show_barang->nama_barang }}</h1>
        <p>
            <b>Merk</b> {{ $show_barang->merk }}
        </p>
        <p>
            <b>Keterangan</b> {{ $show_barang->keterangan }}
        </p>
    </div>
@endsection