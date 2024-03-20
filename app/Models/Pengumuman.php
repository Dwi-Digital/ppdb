<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;
    protected $table        = "pengumuman";
    protected $primaryKey   = "id";
    protected $fillable     = ['wilayah','sekolah','bobot','nisn','nama_siswa','umur','kelamin','sekolah_asal','sekolah_lulus','status'];

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'satpen', 'sekolah_lulus');
    }

    
}
