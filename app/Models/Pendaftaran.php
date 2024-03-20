<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table        = "cpd_zonasi";
    protected $primaryKey   = "id";
    protected $fillable     = ['id_user','kabupaten','kecamatan','desa','sekolah','progres'];

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
    	return $this->hasOne(Dzonasi::class, 'id', 'sekolah')->withDefault();
    }

    public function unic()
    {
    	return $this->hasOne(User::class, 'id', 'id_user')->withDefault();
    }

    public function kuozon()
    {
    	return $this->hasOne(Sekolah::class, 'satpen', 'sekolah1');
    }

    public function sek2()
    {
    	return $this->hasOne(Dzonasi::class, 'id_zonasi', 'sekolah');
    }

    // pendaftar
    public function pribadi()
    {
    	return $this->hasOne(CpdPribadi::class, 'id_user', 'id_user')->withDefault();
    }

    public function ortu()
    {
    	return $this->hasOne(CpdOrtu::class, 'id_user', 'id_user')->withDefault();
    }

    public function pendidikan()
    {
    	return $this->hasOne(CpdPendidikan::class, 'id_user', 'id_user')->withDefault();
    }

    public function berkas()
    {
    	return $this->hasOne(CpdBerkas::class, 'id_user', 'id_user')->withDefault();
    }

    public function konfirmasi()
    {
    	return $this->hasOne(CpdKonfir::class, 'id_user', 'id_user');
    }


}
