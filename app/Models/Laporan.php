<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswas;
use App\Models\Kegiatan;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'bulan',
        'pertemuan',
        'kegiatan_id',
        'isHadir',
        'nilai'
    ];

    public function siswa(){
        return $this->belongsTo(Siswas::class);
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
