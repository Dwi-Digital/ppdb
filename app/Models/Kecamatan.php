<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table        = "kecamatan";
    protected $primaryKey   = "id";
    protected $fillable     = ['id_kab','kode','nm_kec','slug'];

    public function kec()
    {
    	return $this->hasMany(Desa::class, 'id_kec', 'nm_kec');
    }
}
