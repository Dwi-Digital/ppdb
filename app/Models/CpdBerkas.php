<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CpdBerkas extends Model
{
    use HasFactory;

    
    protected $table        = "cpd_berkas";
    protected $primaryKey   = "id";
    protected $fillable     = ['id_user','berkas'];
}
