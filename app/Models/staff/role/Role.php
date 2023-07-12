<?php

namespace App\Models\staff\role;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = "roles";

    protected $fillable = [
        'role_name',
        'is_active',
    ];

    public function permission()
    {
        return $this->belongsToMany(Permission::class);
    }



}
