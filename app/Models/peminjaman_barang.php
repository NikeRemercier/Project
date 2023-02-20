<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman_barang extends Model
{
    use HasFactory;
    protected $fillable = ['id_peminjam', 'kode_barang', 'id_user', 'tanggal_peminjaman', 'tanggal_kembali']; 
    protected $table = 'peminjaman_barang';
    public $timestamps = false;

}
