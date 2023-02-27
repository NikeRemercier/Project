@extends('layout.main')

<!-- START DATA -->
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('perawatan_barang') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
                
<!-- TOMBOL TAMBAH DATA -->
<div class="pb-3">
    <a href='{{ url('perawatan_barang/create') }}' class="btn btn-primary bi bi-plus-circle"> Tambah Data</a>
</div>
          
<div class="table-responsive">
<table class="table table-hover">
<thead>
    <tr style="text-align: center">
        <th class="col-md-1">No</th>
        <th class="col-md-1">Kode Barang</th>
        <th class="col-md-1">Nama Perawat</th>
        <th class="col-md-1">Tanggal Perawatan</th>
        <th class="col-md-1">Kegiatan Perawatan</th>     
        <th class="col-md-1">Keterangan</th>           
        <th class="col-md-1">Aksi</th>
    </tr>
</thead>
<tbody>

    <?php $i = 1?>
    @forelse($perawatan_barang as $item)
    <tr style="text-align: center">
        <td>{{ $i++ }}</td>
        <td><a href="{{ url('detail_barang') }}">{{ $item->kode_barang }}</a></td>
        <td>{{ $item->nama_user }}</td>
        <td>{{ $item->tanggal_perawatan }}</td>
        <td>{{ $item->kegiatan_perawatan }}</td>
        <td>{{ $item->keterangan }}</td>
        <td>
            <a href='{{ url('perawatan_barang/'.$item->id_peminjam.'/edit') }}' class="btn btn-warning btn-sm bi bi-pencil-square"></a>
            <form onsubmit="return confirm('Yakin akan menghapus data?')" action="{{ url('perawatan_barang/'.$item->id_perawat) }}" class="d-inline" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" name="submit" class="btn btn-danger btn-sm bi bi-trash"></button>
            </form>
        </td>
    </tr>    
    @empty
    <td colspan="7"><h5 class="text-center bi bi-database-fill-dash"> Tidak Ada Data</h5></td>
    @endforelse

</tbody>
</table>       
</div> 

{{ $perawatan_barang->links() }}
</div>
@endsection