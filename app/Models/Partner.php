<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Validation\Rules\Unique;

/**
 * Class Partner
 * @package App\Models
 * @version July 13, 2023, 1:10 pm UTC
 *
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $birth_date
 * @property string $occupation
 * @property string $email
 * @property string $type
 */
class Partner extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'partners';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'name',
        'phone',
        'address',
        'birth_date',
        'occupation',
        'email',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'phone' => 'string',
        'address' => 'string',
        'birth_date' => 'date',
        'occupation' => 'string',
        'email' => 'string',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id', 'required'|'integer'|'unique:partners',
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'birth_date' => 'required',
        'occupation' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
