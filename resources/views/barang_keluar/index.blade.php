@extends('layout.main')

<!-- START DATA -->
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('barang_keluar') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
              
<div class="table-responsive">
<table class="table table-hover">
<thead>
    <tr style="text-align: center">
        <th class="col-md-1">No</th>
        <th class="col-md-1">Kode Barang</th>
        <th class="col-md-1">Nama Barang</th>
        <th class="col-md-1">Nama Lokasi</th>
        <th class="col-md-1">Nama Sumber</th>
        <th class="col-md-1">Foto Barang</th>
        <th class="col-md-1">Kondisi</th>
        <th class="col-md-1">Tanggal Keluar</th>        
        <th class="col-md-1">Aksi</th>
    </tr>
</thead>
<tbody>

    <?php $i = 1?>
    @forelse($barang_keluar as $item)
    <tr style="text-align: center">
        <td>{{ $i++ }}</td>
        <td>{{ $item->kode_barang }}</td>
        <td>{{ $item->nama_barang }}</td>
        <td>{{ $item->nama_lokasi }}</td>
        <td>{{ $item->nama_sumber }}</td>
        <td>
            @if ($item->foto_barang)
                <img style="max-width:100px;max-height:100px" src="{{ url('gambar').'/'.$item->foto_barang }}">
            @endif
        </td>
        <td>{{ $item->kondisi }}</td>
        <td>{{ $item->tanggal_keluar }}</td>
        <td>
            <form onsubmit="return confirm('Yakin akan menghapus data?')" action="{{ url('barang_keluar/'.$item->id_keluar) }}" class="d-inline" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" name="submit" class="btn btn-danger btn-sm bi bi-trash"> Delete</button>
            </form>
        </td>
    </tr>    
    @empty
    <td colspan="9"><h5 class="text-center bi bi-database-fill-dash"> Tidak Ada Data</h5></td>
    @endforelse

</tbody>
</table>        
</div>

{{ $barang_keluar->links() }}
</div>
@endsection