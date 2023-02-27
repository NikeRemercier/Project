@extends('layout.main')

<!-- START DATA -->
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">

    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('supplier') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
                
<!-- TOMBOL TAMBAH DATA -->
<div class="pb-3">
    <a href='{{ url('supplier/create') }}' class="btn btn-primary bi bi-plus-circle"> Tambah Data</a>
</div>
          
<div class="table-responsive">
<table class="table table-hover">
    <thead>
        <tr style="text-align: center">
            <th class="col-md-1">No</th>
            <th class="col-md-1">Nama Supplier</th>
            <th class="col-md-1">Alamat Supplier</th>
            <th class="col-md-1">Telp Supplier</th>
            <th class="col-md-1">Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $i = $supplier->firstItem() ?>
        @forelse($supplier as $item)
        <tr style="text-align: center">
            <td>{{ $i++ }}</td>
            <td>{{ $item->nama_supplier }}</td>
            <td>{{ $item->alamat_supplier }}</td>
            <td>{{ $item->telp_supplier }}</td>
            <td>
                <a href='{{ url('supplier/'.$item->id_supplier.'/edit') }}' class="btn btn-warning btn-sm bi bi-pencil-square"> Edit</a>
                <form onsubmit="return confirm('Yakin akan menghapus data?')" action="{{ url('supplier/'.$item->id_supplier) }}" class="d-inline" method="post">
                    @csrf @method('DELETE')
                    <button type="submit" name="submit" class="btn btn-danger btn-sm bi bi-trash"> Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <td colspan="5"><h5 class="text-center bi bi-database-fill-dash"> Tidak Ada Data</h5></td>
        @endforelse
    </tbody>
</table>
</div>

{{ $supplier->links() }}
</div>
@endsection
