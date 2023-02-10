<?php

namespace App\Repositories\Base;

use App\Models\Base\Shiftment;
use App\Repositories\BaseRepository;

/**
 * Class ShiftmentRepository
 * @package App\Repositories\Base
 * @version October 24, 2022, 10:18 am WIB
*/

class ShiftmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name',
        'start_hour',
        'end_hour',
        'overday'
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
