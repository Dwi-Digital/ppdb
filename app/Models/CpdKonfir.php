<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CpdKonfir extends Model
{
    use HasFactory;
    protected $table        = "cpd_konfir";
    protected $primaryKey   = "id";
    protected $fillable     = ['id_user','konfir'];


    public function zonasi()
    {
    	return $this->hasOne(CpdZonasi::class, 'id_user', 'id_user');
    }

    // pendaftar
    public function pribadi()
    {
    	return $this->hasOne(CpdPribadi::class, 'id_user', 'id_user');
    }

    public function ortu()
    {
    	return $this->hasOne(CpdOrtu::class, 'id_user', 'id_user');
    }

    public function pendidikan()
    {
    	return $this->hasOne(CpdPendidikan::class, 'id_user', 'id_user');
    }

    public function berkas()
    {
    	return $this->hasOne(CpdBerkas::class, 'id_user', 'id_user');
    }

    public function konfirmasi()
    {
    	return $this->hasOne(CpdKonfir::class, 'id_user', 'id_user');
    }
    }
