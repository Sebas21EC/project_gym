<?php

namespace App\Repositories;

use App\Models\Partner;
use App\Repositories\BaseRepository;

/**
 * Class PartnerRepository
 * @package App\Repositories
 * @version July 13, 2023, 1:10 pm UTC
*/

class PartnerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'phone',
        'address',
        'birth_date',
        'occupation',
        'email',
        'type'
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
        return Partner::class;
    }
}
