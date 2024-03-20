<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpdbView extends Model
{
    use HasFactory;
    protected $table        = "ppdb_view";
    protected $primaryKey   = "id";
    protected $fillable     = ['ip_address'];
}
