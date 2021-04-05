<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Aktifitas extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','judul_aktifitas','deskripsi_aktifitas','gambar'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
