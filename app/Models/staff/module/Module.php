<?php

namespace App\Models\staff\module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\staff\role\Role;


class Module extends Model
{
    use HasFactory;
    protected $table = 'modules';

    public function roles():BelongsToMany
    {
        return $this->belongsToMany(Role::class)->withTimestamps()->withPivot('is_active')->wherePivot('is_active', 1);
    }

    
}
