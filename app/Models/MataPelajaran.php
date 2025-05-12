<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'guru_id',
    ];

    // Relasi dengan model Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function siswas()
{
    return $this->belongsToMany(\App\Models\Siswa::class, 'jadwal_pelajarans');
}

}
