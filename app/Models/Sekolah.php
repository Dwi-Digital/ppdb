<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $table        = "sekolah";
    protected $primaryKey   = "id";
    protected $fillable     = ['jenjang','npsn','satpen','status','akreditasi','prestasi','pindahOrtu','afirmasi','zonasi','kuota','slug'];

    public function zonasi()
    {
        return $this->hasMany(Zonasi::class, 'id_zonasi', 'satpen');
    }

    public function pengumuman()
    {
        return $this->hasMany(Pengumuman::class, 'sekolah_lulus', 'satpen');
    }

    public function sekolah()
    {
        return $this->hasOne(Dzonasi::class, 'id_zonasi', 'satpen');
    }

    public function cpd_zonasi()
    {
        return $this->hasMany(CpdZonasi::class, 'sekolah1', 'satpen');
    }

    
}
