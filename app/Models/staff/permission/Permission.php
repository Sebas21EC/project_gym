<?php

namespace App\Models\staff\permission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = "permissions";

    public function role()
    {
        return $this->belongsToMany(Role::class);
    }
}
