<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class view_join_peminjaman_barang extends Model
{
    use HasFactory;
    protected $fillable = ['id_peminjam', 'kode_barang', 'id_user', 'tanggal_peminjaman', 'tanggal_kembali','nama_user']; 
    protected $table = 'view_join_peminjaman_barang';
    public $timestamps = false;
}
