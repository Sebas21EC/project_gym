<?php

namespace App\Repositories;

use App\Models\HealthCard;
use App\Repositories\BaseRepository;

/**
 * Class HealthCardRepository
 * @package App\Repositories
 * @version July 16, 2023, 3:34 pm UTC
*/

class HealthCardRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return HealthCard::class;
    }
}
