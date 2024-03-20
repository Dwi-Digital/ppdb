<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $table        = "provinsi";
    protected $primaryKey   = "id";
    protected $fillable     = ['kode','nm_prov','slug'];

    public function prov()
    {
    	return $this->hasMany(Kabupaten::class, 'id_prov', 'id');
    }
}
