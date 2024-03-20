<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;

    protected $table        = "kabupaten";
    protected $primaryKey   = "id";
    protected $fillable     = ['id_prov','kode','nm_kab','slug'];
    protected $guarded =    ['id'];

    public function kab()
    {
    	return $this->hasMany(Kecamatan::class, 'id_kab', 'nm_kab');
    }
}
