<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table        = "mode";
    protected $primaryKey   = "id";
    protected $fillable     = ['mode'];
}
