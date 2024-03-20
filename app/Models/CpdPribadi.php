<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CpdPribadi extends Model
{
    use HasFactory;

    protected $table        = "cpd_pribadi";
    protected $primaryKey   = "id";
    protected $fillable     = ['id_user','nama_siswa','tanggal','nisn','kelamin','agama','nohp','alamat','progres'];

    // public function product()
    // {
    //     return $this->belongsTo(CpdOrtu::class, 'id_user');
    // }
}
