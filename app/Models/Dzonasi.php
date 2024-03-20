<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dzonasi extends Model
{
    use HasFactory;

    protected $table        = "dzonasi";
    protected $primaryKey   = "id";
    protected $fillable     = ['id_zonasi','id_desa','id_kec','bobot'];

    public function zona()
    {
    	return $this->hasOne(Zonasi::class, 'id', 'id_zonasi');
    }

    public function desa()
    {
    	return $this->hasOne(Desa::class, 'id', 'id_desa');
    }

    public function kuotaa()
    {
    	return $this->hasOne(Sekolah::class, 'satpen', 'id_zonasi')->withDefault();
    }

    public function umum()
    {
    	return $this->hasMany(Pengumuman::class, 'sekolah_lulus', 'id_zonasi');
    }
}
