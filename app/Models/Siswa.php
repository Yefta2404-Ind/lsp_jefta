<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nis',
        'alamat',
        'kelas_id',
        'telepon', // tambahkan semua field yang digunakan di form
    ];
    // app/Models/Siswa.php
public function kelas()
{
    return $this->belongsTo(Kelas::class, 'kelas_id');  // pastikan 'kelas_id' adalah nama kolom yang menghubungkan siswa ke kelas
}


    public function mataPelajarans()
{
    return $this->belongsToMany(\App\Models\MataPelajaran::class, 'jadwal_pelajarans');
}
public function siswas()
{
    return $this->hasMany(Siswa::class);
}

}
