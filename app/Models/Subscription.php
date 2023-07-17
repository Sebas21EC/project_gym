<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Subscription
 * @package App\Models
 * @version July 15, 2023, 12:36 am UTC
 *
 * @property \App\Models\Partner $partner
 * @property \App\Models\SubscriptionType $subscriptionType
 * @property integer $partner_id
 * @property integer $subscription_type_id
 * @property string $start_date
 * @property string $end_date
 * @property string $state
 */
class Subscription extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'subscriptions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'partner_id',
        'subscription_type_id',
        'start_date',
        'end_date',
        'state',
        'total_amount',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'partner_id' => 'integer',
        'subscription_type_id' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
        'state' => 'string',
        'total_amount' => 'decimal:2',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'partner_id' => 'required',
        'subscription_type_id' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        // 'state' => 'required|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];
    protected $attributes = [
        'state' => 'pend',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function partner()
    {
        return $this->belongsTo(\App\Models\Partner::class, 'partner_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function subscriptionType()
    {
        return $this->belongsTo(\App\Models\SubscriptionType::class, 'subscription_type_id');
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
