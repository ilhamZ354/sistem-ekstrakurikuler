<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Orangtua extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'orangtua';
    
    protected $fillable = [
        'nama',
        'email',
        'username',
        'siswa_id',
        'no_wa',
        'password',
        'kodeSiswa',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function siswa(){
        return $this->hasOne(Siswas::class);
    }

}
