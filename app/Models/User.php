<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nisn',
        'instansi',
        'name',
        'tanggal',
        'kabupaten',
        'kecamatan',
        'desa',
        'token',
        'verifikator',
        'email',
        'password',
        'role',
        'avatar',
        'unicCode',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function token()
    {
    // Setiap user akan memiliki banyak data
    return $this->hasMany('App\Models\Token','id_user','id');
    }

    public function logs()
    {
    // Setiap user akan memiliki banyak data
    return $this->hasMany('App\Models\Log','id_user','id');
    }

    public function sekolah()
    {
    // Setiap user akan memiliki banyak data
    return $this->hasMany('App\Models\Sekolah','satpen','instansi');
    }
}
