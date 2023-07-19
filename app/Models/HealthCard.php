<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class HealthCard
 * @package App\Models
 * @version July 16, 2023, 3:34 pm UTC
 *
 * @property \App\Models\Partner $partner
 * @property integer $activity_level
 * @property integer $feeding_frequency
 * @property string $intolerances
 * @property string $allergies
 * @property string $food_preparation
 * @property string $pathology
 * @property string $family_pathology
 * @property string $medication
 * @property integer $partner_id
 */
class HealthCard extends EloquentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'health_cards';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'activity_level',
        'feeding_frequency',
        'intolerances',
        'allergies',
        'food_preparation',
        'pathology',
        'family_pathology',
        'medication',
        'partner_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'activity_level' => 'integer',
        'feeding_frequency' => 'integer',
        'intolerances' => 'string',
        'allergies' => 'string',
        'food_preparation' => 'string',
        'pathology' => 'string',
        'family_pathology' => 'string',
        'medication' => 'string',
        'partner_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'activity_level' => 'required|integer',
        'feeding_frequency' => 'required|integer',
        'intolerances' => 'required|string|max:255',
        'allergies' => 'required|string|max:255',
        'food_preparation' => 'required|string|max:255',
        'pathology' => 'required|string|max:255',
        'family_pathology' => 'required|string|max:255',
        'medication' => 'required|string|max:255',
        'partner_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function partner()
    {
        return $this->belongsTo(\App\Models\Partner::class, 'partner_id');
    }
}
