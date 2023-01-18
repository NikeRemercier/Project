<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $fillable = ['id_barang', 'nama_barang', 'merk', 'total_barang']; 
    protected $table = 'barang';
    public $timestamps = false;
}
