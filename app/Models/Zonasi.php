<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zonasi extends Model
{
    use HasFactory;

    protected $table        = "zonasi";
    protected $primaryKey   = "id";
    protected $fillable     = ['kab','satpen','slug'];

    public function zon()
    {
    	return $this->hasMany(Dzonasi::class, 'id_zonasi', 'satpen');
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'satpen', 'id_zonasi');
    }

    public function jumlah()
    {
    	return $this->hasOne(Sekolah::class, 'satpen', 'satpen');
    }
    
    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'sekolah_lulus', 'satpen');
    }

}
