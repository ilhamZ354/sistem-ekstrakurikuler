<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kegiatan;
use App\Models\Siswas;

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

    public function siswa(){
        return $this->belongsTo(Siswas::class);
    }
}
