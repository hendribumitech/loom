<?php

namespace App\Repositories\Base;

use App\Models\Base\Machine;
use App\Repositories\BaseRepository;

/**
 * Class MachineRepository
 * @package App\Repositories\Base
 * @version October 24, 2022, 10:18 am WIB
*/

class MachineRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name',
        'capacity',
        'capacity_uom_id',
        'period_uom_id',
        'description',
        'types'
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
        return Machine::class;
    }
}
