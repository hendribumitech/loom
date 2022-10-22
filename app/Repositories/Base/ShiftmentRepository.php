<?php

namespace App\Repositories\Base;

use App\Models\Base\Shiftment;
use App\Repositories\BaseRepository;

/**
 * Class ShiftmentRepository
 * @package App\Repositories\Base
 * @version October 22, 2022, 10:34 pm WIB
*/

class ShiftmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name'
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
        return Shiftment::class;
    }
}
