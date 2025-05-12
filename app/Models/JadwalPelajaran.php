<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelajaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelas_id',
        'mata_pelajaran_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
    ];

    // Relasi dengan Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    // Relasi dengan MataPelajaran
    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class);
    }
}

