<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kegiatan;
use App\Models\Laporan;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'kegiatan_id',
        'jumlah_pertemuan',
        'hari',
        'waktu'
    ];

    public function laporan(){
        return $this->hasMany(Laporan::class);
    }

    public function kegiatan(){
        return $this->belongsTo(Kegiatan::class);
    }
}
