<?php

namespace App\Models\staff\occupation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    use HasFactory;

    protected $table = "occupations";

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
