<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kegiatan;

class SiswaKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'kegiatan_id',
    ];

    public function kegiatan(){
        return $this->belongsTo(Kegiatan::class);
    }
}
