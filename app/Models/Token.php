<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $table        = "token";
    protected $primaryKey   = "id";
    protected $fillable     = ['id_user','sekolah','verifikator','nisn','nama','tanggal','token','kabupaten','kecamatan','desa'];

    


    public function users()
    {
    	return $this->hasOne(User::class, 'id', 'id_user');
    }

}
