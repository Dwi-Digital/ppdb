<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_roles extends Model
{
    use HasFactory;

    protected $table        = "roles";
    protected $primaryKey   = "id";
    protected $dates        = ['deleted_at'];
    protected $fillable     = ['id_user','name'];

    public function roles()
    {
    	return $this->hasMany(User::class, 'role', 'name');
    }
}
