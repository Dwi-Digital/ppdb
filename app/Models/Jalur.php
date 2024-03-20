<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jalur extends Model
{
    use HasFactory;

    protected $table        = "jalur";
    protected $primaryKey   = "id";
    protected $fillable     = ['jalur','kegiatan','keterangan','lokasi','tgl_mulai','tgl_selesai','color','no_urut','status','slug'];
}
