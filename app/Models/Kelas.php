<?php
// app/Models/Kelas.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = ['nama']; // pastikan ini ada jika pakai mass assignment

    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }
}

