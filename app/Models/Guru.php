<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
    ];

    // Relasi dengan MataPelajaran
    public function mataPelajarans()
    {
        return $this->hasMany(MataPelajaran::class);
    }
}
