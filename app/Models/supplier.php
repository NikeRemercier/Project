<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;
    protected $fillable = ['id_supplier', 'nama_supplier', 'alamat_supplier', 'telp_supplier']; 
    protected $table = 'supplier';
    public $timestamps = false;
}
