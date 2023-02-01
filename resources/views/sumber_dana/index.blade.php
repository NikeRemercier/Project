@extends('layout.main')

<!-- START DATA -->
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('sumber_dana') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
                
<!-- TOMBOL TAMBAH DATA -->
<div class="pb-3">
    <a href='{{ url('sumber_dana/create') }}' class="btn btn-primary bi bi-plus-circle"> Tambah Data</a>
</div>
          
<table class="table table-hover">
<thead>
    <tr style="text-align: center">
        <th class="col-md-1">No</th>
        <th class="col-md-1">Nama Sumber</th>
        <th class="col-md-1">Keterangan</th>
        <th class="col-md-1">Aksi</th>
    </tr>
</thead>
<tbody>

    <?php $i = $sumber_dana->firstItem() ?>
    @forelse($sumber_dana as $item)
    <tr style="text-align: center">
        <td>{{ $i++ }}</td>
        <td>{{ $item->nama_sumber }}</td>
        <td>{{ $item->keterangan }}</td>
        <td>
            <a href='{{ url('sumber_dana/'.$item->id_sumber.'/edit') }}' class="btn btn-warning btn-sm bi bi-pencil-square"> Edit</a>
            <form onsubmit="return confirm('Yakin akan menghapus data?')" action="{{ url('sumber_dana/'.$item->id_sumber) }}" class="d-inline" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" name="submit" class="btn btn-danger btn-sm bi bi-trash"> Delete</button>
            </form>
        </td>
    </tr>    
    @empty
    <td colspan="4"><h5 class="text-center bi bi-database-fill-dash"> Tidak Ada Data</h5></td>
    @endforelse
  
</tbody>
</table>        

{{ $sumber_dana->links() }}
</div>
@endsection