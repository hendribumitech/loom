<?php

namespace App\Repositories\Base;

use App\Models\Base\CategoryOff;
use App\Repositories\BaseRepository;

/**
 * Class CategoryOffRepository
 * @package App\Repositories\Base
 * @version October 24, 2022, 3:07 pm WIB
*/

class CategoryOffRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name',
        'description'
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
        return CategoryOff::class;
    }
}
