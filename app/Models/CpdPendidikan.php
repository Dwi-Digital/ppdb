<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CpdPendidikan extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table        = "cpd_pendidikan";
    protected $primaryKey   = "id";
    protected $fillable     = ['id_user','nm_sekolah','provinsi','kabupaten','progres'];

}
