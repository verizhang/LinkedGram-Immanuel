<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Lowongan;
use App\Models\User;


class Pelamar extends Model
{
    use HasFactory;
    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
