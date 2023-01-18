@extends('layout.main')
<!-- START DATA -->
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('barang') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
                
<!-- TOMBOL TAMBAH DATA -->
<div class="pb-3">
    <a href='{{ url('barang/create') }}' class="btn btn-primary">+ Tambah Data</a>
    @auth
    <a class="btn btn-primary" href='{{ route('password') }}'>Ubah Password</a>    
    <a class="btn btn-danger" href='{{ route('logout') }}'>Logout</a>    
    @endauth
    @guest
    <a class="btn btn-primary" href='{{ route('login') }}'>Login</a>
    <a class="btn btn-info" href='{{ route('register') }}'>Register</a>        
    @endguest
    
</div>
          
<table class="table table-striped">
<thead>
    <tr style="text-align: center">
        <th class="col-md-1">No</th>
        <th class="col-md-1">ID Barang</th>
        <th class="col-md-1">Nama Barang</th>
        <th class="col-md-1">Merk</th>
        <th class="col-md-1">Total Barang</th>
        <th class="col-md-1">Aksi</th>
    </tr>
</thead>
<tbody>

    <?php $i = $data1->firstItem() ?>
    @foreach ($data1 as $item)
    <tr style="text-align: center">
        <td>{{ $i }}</td>
        <td>{{ $item->id_barang }}</td>
        <td>{{ $item->nama_barang }}</td>
        <td>{{ $item->merk }}</td>
        <td>{{ $item->total_barang }}</td>
        <td>
            <a href='{{ url('barang/'.$item->id_barang.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
            <form onsubmit="return confirm('Yakin akan menghapus data?')" action="{{ url('barang/'.$item->id_barang) }}" class="d-inline" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>    
    <?php $i++ ?>
    @endforeach

</tbody>
</table>            
{{ $data1->links() }}
</div>
@endsection
<!-- AKHIR DATA -->