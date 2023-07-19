<?php

namespace App\Models\staff\employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\staff\occupation\Occupation;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    protected $table = "employees";

    public function occupation()
    {
        return $this->belongsTo(Occupation::class);
    }

    
    public function occupations():BelongsTo
    {
        return $this->belongsTo(Occupation::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
