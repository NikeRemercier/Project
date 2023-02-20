<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang_keluar extends Model
{
    use HasFactory;
    protected $fillable = ['kode_barang', 'id_barang', 'id_lokasi', 'id_sumber', 'kondisi', 'foto_barang', 'tanggal_keluar']; 
    protected $table = 'barang_keluar';
    public $timestamps = false;
}
