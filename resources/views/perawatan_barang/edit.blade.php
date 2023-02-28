@extends('layout.main')
<!-- START FORM -->
@section('konten')

<form action='{{ url('perawatan_barang/'.$edit_perawatan_barang->id_perawat) }}' method='post'>
@csrf
@method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('perawatan_barang') }}" class="btn btn-secondary bi bi-back"> Kembali</a>
        <div class="mb-3 row">
            <label for="id_lokasi" class="col-sm-2 col-form-label">Lokasi Barang</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="id_lokasi" id="id_lokasi">
                    <option disabled selected>Pilih Lokasi Barang</option>
                        @foreach($lokasi as $item)
                            <option value="{{ $item->id_lokasi }}">{{ $item->nama_lokasi }}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kode_barang" class="col-sm-2 col-form-label">Kode Barang</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="kode_barang" id="kode_barang">
                    <option disabled selected>Silahkan Pilih Lokasi Barang Terlebih Dahulu</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_user" class="col-sm-2 col-form-label">Nama Perawat</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="id_user" id="id_user">
                    <option disabled selected>Pilih User</option>
                        @foreach($user as $item)
                            <option value="{{ $item->id_user }}">{{ $item->nama_user }}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tanggal_perawatan" class="col-sm-2 col-form-label">Tanggal Perawatan</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" value='{{ $edit_perawatan_barang->tanggal_perawatan }}' name='tanggal_perawatan' id="tanggal_perawatan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kegiatan_perawatan" class="col-sm-2 col-form-label">Kegiatan Perawatan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value='{{ $edit_perawatan_barang->kegiatan_perawatan }}' name='kegiatan_perawatan' id="kegiatan_perawatan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="keterangan" class="col-sm-2 col-form-label">keterangan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value='{{ $edit_perawatan_barang->keterangan }}' name='keterangan' id="keterangan">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary bi bi-save" name="submit"> Simpan</button></div>
        </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
    $('#id_lokasi').on('change', function() {
       var lokasiID = $(this).val();
       if(lokasiID) {
           $.ajax({
               url: '/getLokasi/'+lokasiID,
               type: "GET",
               data : {"_token":"{{ csrf_token() }}"},
               dataType: "json",
               success:function(data)
               {
                 if(data){
                    $('#kode_barang').empty();
                    $('#kode_barang').append('<option hidden>Pilih Kode Barang</option>'); 
                    $.each(data, function(key, lokasi_barang){
                        $('#kode_barang').append('<option value="'+ lokasi_barang.kode_barang +'">' + lokasi_barang.kode_barang + '</option>');
                    });
                }else{
                    $('#kode_barang').empty();
                }
             }
           });
       }else{
         $('#kode_barang').empty();
       }
    });
    });
</script>
@endsection