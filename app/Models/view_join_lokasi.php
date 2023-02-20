<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class view_join_lokasi extends Model
{
    use HasFactory;
    protected $fillable = ['id_lokasi', 'nama_lokasi', 'id_user', 'keterangan', 'nama_user']; 
    protected $table = 'view_join_lokasi';
    public $timestamps = false;
}
