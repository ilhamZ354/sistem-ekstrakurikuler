<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SiswaKegiatan;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'pembimbing',
        'tempat',
        'jumlah_peseta',
    ];

    public function siswa(){
        return $this->hasMany(SiswaKegiatan::class);
    }
}
