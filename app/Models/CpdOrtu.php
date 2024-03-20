<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CpdOrtu extends Model
{
    use HasFactory;
    protected $table        = "cpd_ortu";
    protected $primaryKey   = "id";
    protected $fillable     = ['id_user','nm_ayah','pekerjaan_ayah','no_ayah','nm_ibu','pekerjaan_ibu','no_ibu','nm_wali','pekerjaan_wali','no_wali','progres'];

    
    // public function orders()
    // {
    //     return $this->hasMany(Cpd_pribadi::class, 'id_user');
    // }
}
