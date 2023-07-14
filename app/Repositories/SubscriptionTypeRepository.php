<?php

namespace App\Repositories;

use App\Models\SubscriptionType;
use App\Repositories\BaseRepository;

/**
 * Class SubscriptionTypeRepository
 * @package App\Repositories
 * @version July 14, 2023, 12:57 am UTC
*/

class SubscriptionTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'n_months',
        'price'
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
        return SubscriptionType::class;
    }
}
