<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    // Jika tabelnya tidak bernama 'activity_logs', tambahkan nama tabel
    protected $table = 'activity_logs';

    // Jika menggunakan kolom timestamps (created_at, updated_at)
    public $timestamps = true;

    // Kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'user_id',
        'activity',
        'description',
        'ip_address',
        'user_agent',
    ];

    // Relasi ke model User (jika ada)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
