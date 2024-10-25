<?php

namespace App\Models\User;

use App\Models\User\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'permissions'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
