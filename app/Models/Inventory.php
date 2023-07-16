<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Inventory
 * @package App\Models
 * @version July 16, 2023, 2:30 pm UTC
 *
 * @property string $machine
 * @property string $detail
 * @property integer $quantity
 * @property number $unit_price
 * @property number $total_price
 * @property string $state
 */
class Inventory extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'inventories';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'machine',
        'detail',
        'quantity',
        'unit_price',
        'total_price',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'machine' => 'string',
        'detail' => 'string',
        'quantity' => 'integer',
        'unit_price' => 'decimal:2',
        'total_price' => 'decimal:2',
        'state' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'machine' => 'required|string|max:255',
        'detail' => 'required|string|max:255',
        'quantity' => 'required|integer',
        'unit_price' => 'required|numeric',
        'total_price' => 'required|numeric',
        'state' => 'required|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
