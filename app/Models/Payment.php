<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class Payment
 * @package App\Models
 * @version July 15, 2023, 6:35 am UTC
 *
 * @property \App\Models\Subscription $subscription
 * @property integer $subscription_id
 * @property string $date_payment
 * @property number $amount
 * @property string $payment_method
 * @property string $description
 */
class Payment extends EloquentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'payments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'subscription_id',
        'date_payment',
        'amount',
        'payment_method',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'subscription_id' => 'integer',
        'date_payment' => 'date',
        'amount' => 'decimal:2',
        'payment_method' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'subscription_id' => 'required',
        'date_payment' => 'required',
        'amount' => 'required|numeric',
        'payment_method' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function subscription()
    {
        return $this->belongsTo(\App\Models\Subscription::class, 'subscription_id');
    }
}
