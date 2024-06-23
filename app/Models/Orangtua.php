<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'username',
        'no_wa',
        'password',
        'kodeSiswa',
    ];

    public function siswa(){
        return $this->hasOne(Siswas::class);
    }
}
