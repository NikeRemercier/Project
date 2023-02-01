@extends('layout.main')

@section('konten')
<form action='{{ url('supplier/'.$edit_supplier->id_supplier) }}' method='post'>
@csrf @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('supplier') }}" class="btn btn-secondary bi bi-back"> Kembali</a>
        <div class="mb-3 row">
            <label for="nama_supplier" class="col-sm-2 col-form-label">Nama Supplier</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value='{{ $edit_supplier->nama_supplier }}' name='nama_supplier' id="nama_supplier">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat_supplier" class="col-sm-2 col-form-label">Alamat Supplier</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value='{{ $edit_supplier->alamat_supplier }}' name='alamat_supplier' id="alamat_supplier">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="telp_supplier" class="col-sm-2 col-form-label">Telepon Supplier</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" value='{{ $edit_supplier->telp_supplier }}' name='telp_supplier' id="telp_supplier">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary bi bi-save" name="submit"> Simpan</button></div>
        </div>
    </div>
</form>
@endsection
