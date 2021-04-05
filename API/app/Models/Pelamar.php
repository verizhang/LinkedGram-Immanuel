<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Lowongan;


class Pelamar extends Model
{
    use HasFactory;
    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }
}
