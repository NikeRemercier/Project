<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class level_user extends Model
{
    use HasFactory;
    protected $fillable = ['id_level', 'nama_level']; 
    protected $table = 'level_user';
    public $timestamps = false;
}
