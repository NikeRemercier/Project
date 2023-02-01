<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sumber_dana extends Model
{
    use HasFactory;
    protected $fillable = ['id_sumber', 'nama_sumber', 'keterangan'];
    protected $table = 'sumber_dana'; 
    public $timestamps = false;
}
