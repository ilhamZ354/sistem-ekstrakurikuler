<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SiswaKegiatan;
use App\Models\Jadwal;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'pembimbing',
        'tempat',
        'penanggungjawab',
        'jumlah_peseta',
    ];

    public function siswa(){
        return $this->hasMany(SiswaKegiatan::class);
    }

    public function jadwal(){
        return $this->hasMany(Jadwal::class);
    }
}
