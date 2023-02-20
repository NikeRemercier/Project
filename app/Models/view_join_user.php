<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class view_join_user extends Model
{
    use HasFactory;
    protected $fillable = ['id_user', 'nama_user', 'id_level', 'username', 'password', 'nama_level']; 
    protected $table = 'view_join_user';
    public $timestamps = false;
}
