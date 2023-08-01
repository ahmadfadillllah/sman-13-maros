<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = 'surat';

    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Kelas::class, 'siswa_id');
    }

    public function nomorsurat()
    {
        return $this->belongsTo(User::class, 'nomorsurat_id');
    }
}
