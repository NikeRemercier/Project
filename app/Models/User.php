<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;
    protected $fillable = ['id_user', 'nama_user', 'id_level', 'username', 'password']; 
    protected $table = 'user';
    public $timestamps = false;
}
