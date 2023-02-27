@extends('layout.main')

<!-- START DATA -->
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr style="text-align: center">
                  <th scope="col-md-1"><a href="{{ url('lokasi') }}">Jumlah Lokasi</a></th>
                  <th scope="col-md-1"><a href="{{ url('supplier') }}">Jumlah Supplier</a></th>
                  <th scope="col-md-1"><a href="{{ url('sumber_dana') }}">Jumlah Sumber Dana</a></th>
                </tr>
              </thead>
              <tbody>
                <tr style="text-align: center">
                  <th>{{ $lokasi }}</th>
                  <th>{{ $supplier }}</th>
                  <th>{{ $sumber_dana }}</th>
                </tr>
              </tbody>
        </table>
    </div>
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('barang') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
                
<!-- TOMBOL TAMBAH DATA -->
<div class="pb-3">
    <a href='{{ url('barang/create') }}' class="btn btn-primary bi bi-plus-circle"> Tambah Data</a>
</div>

<div class="table-responsive">
<table class="table table-hover">
<thead>
    <tr style="text-align: center">
        <th class="col-md-1">No</th>
        <th class="col-md-1">Nama Barang</th>
        <th class="col-md-1">Merk</th>
        <th class="col-md-1">Spesifikasi</th>
        <th class="col-md-1">Total Barang</th>
        <th class="col-md-1">Aksi</th>
    </tr>
</thead>
<tbody>

    <?php $i = $barang->firstItem() ?>
    @forelse($barang as $item)
    <tr style="text-align: center">
        <td>{{ $i++ }}</td>
        <td>{{ $item->nama_barang }}</td>
        <td>{{ $item->merk }}</td>
        <td>{{ $item->spesifikasi }}</td>
        <td>{{ $item->total_barang }}</td>
        <td>
            <a href='{{ url('barang/'.$item->id_barang.'/edit') }}' class="btn btn-warning btn-sm bi bi-pencil-square"> Edit</a>
            <form onsubmit="return confirm('Yakin akan menghapus data?')" action="{{ url('barang/'.$item->id_barang) }}" class="d-inline" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" name="submit" class="btn btn-danger btn-sm bi bi-trash"> Delete</button>
            </form>
        </td>
    </tr>    
    @empty
    <td colspan="6"><h5 class="text-center bi bi-database-fill-dash"> Tidak Ada Data</h5></td>
    @endforelse

</tbody>
</table>   
</div>     

{{ $barang->links() }}
</div>
@endsection