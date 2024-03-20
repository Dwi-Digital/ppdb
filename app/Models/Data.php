<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    
    protected $table        = "basedata";
    protected $primaryKey   = "id";
    protected $fillable     = ['sekolah','nik','nisn','nama','tmp_lahir','tgl_lahir','kelamin','kab_kota','kec','desa','dusun'];
}
