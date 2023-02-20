<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_barang extends Model
{
    use HasFactory;
    protected $fillable = ['kode_barang', 'id_barang', 'id_lokasi', 'id_sumber', 'kondisi', 'foto_barang', 'tahun_pembelian']; 
    protected $table = 'detail_barang';
    public $timestamps = false;
}
