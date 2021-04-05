<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Pelamar;
use App\Models\User;

class Lowongan extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pelamar()
    {
        return $this->hasMany(Pelamar::class);
    }
}
