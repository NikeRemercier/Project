<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perawatan_barang extends Model
{
    use HasFactory;
    protected $fillable = ['id_perawat', 'kode_barang', 'id_user','id_lokasi','tanggal_perawatan', 'kegiatan_perawatan', 'keterangan']; 
    protected $table = 'perawatan_barang';
    public $timestamps = false;
}
