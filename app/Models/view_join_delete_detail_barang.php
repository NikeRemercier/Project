<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class view_join_delete_detail_barang extends Model
{
    use HasFactory;
    protected $fillable = ['kode_barang', 'id_barang', 'id_lokasi', 'id_sumber', 'kondisi', 'foto_barang', 'tahun_pembelian', 'nama_barang', 'nama_lokasi', 'nama_sumber']; 
    protected $table = 'view_join_delete_detail_barang';
    public $timestamps = false;
}
