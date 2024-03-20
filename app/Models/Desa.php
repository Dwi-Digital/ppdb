<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $table        = "desa";
    protected $primaryKey   = "id";
    protected $fillable     = ['id_kec','kode','nm_desa','slug'];

    public function desa()
    {
    	return $this->hasMany(Sekolah::class, 'id_desa', 'id');
    }
}
