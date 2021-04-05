<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'aktifitas';
    protected $primary = 'id';
    protected $fillable = ['user_id', 'kelas','jurusan','alamat','no_telepon','status'];
}