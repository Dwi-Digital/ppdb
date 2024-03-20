<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CpdZonasi extends Model
{
    use HasFactory;

    protected $table        = "cpd_zonasi";
    protected $primaryKey   = "id";
    protected $fillable     = ['id_user','kabupaten','kecamatan','desa','sekolah','sekolah1','progres','status','lulus'];

    public function kab()
    {
    	return $this->hasOne(Kabupaten::class, 'id', 'kabupaten');
    }

    public function kec()
    {
    	return $this->hasOne(Kecamatan::class, 'id', 'kecamatan');
    }

    public function des()
    {
    	return $this->hasOne(Desa::class, 'id', 'desa');
    }

    public function sek()
    {
    	return $this->hasOne(Dzonasi::class, 'id_zonasi', 'sekolah1');
    }

    public function sek2()
    {
    	return $this->hasOne(Dzonasi::class, 'id_zonasi', 'sekolah');
    }
}
