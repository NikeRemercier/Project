@extends('layout.main')

<!-- START DATA -->
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">

    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('level_user') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
                
<!-- TOMBOL TAMBAH DATA -->
<div class="pb-3">
    <a href='{{ url('level_user/create') }}' class="btn btn-primary bi bi-plus-circle"> Tambah Data</a>
</div>
          
<table class="table table-hover">
    <thead>
        <tr style="text-align: center">
            <th class="col-md-1">No</th>
            <th class="col-md-1">Nama Level</th>
            <th class="col-md-1">Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $i = $level_user->firstItem() ?>
        @forelse ($level_user as $item)
        <tr style="text-align: center">
            <td>{{ $i++ }}</td>
            <td>{{ $item->nama_level }}</td>
            <td>
                <a href='{{ url('level_user/'.$item->id_level.'/edit') }}' class="btn btn-warning btn-sm bi bi-pencil-square"> Edit</a>
                <form onsubmit="return confirm('Yakin akan menghapus data?')" action="{{ url('level_user/'.$item->id_level) }}" class="d-inline" method="post">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" name="submit" class="btn btn-danger btn-sm bi bi-trash"> Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <td colspan="3"><h5 class="text-center bi bi-database-fill-dash"> Tidak Ada Data</h5></td>
        @endforelse
        
    </tbody>
</table>

{{ $level_user->links() }}
</div>
@endsection
