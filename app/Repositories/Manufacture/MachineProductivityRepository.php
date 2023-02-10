<?php

namespace App\Repositories\Manufacture;

use App\Models\Manufacture\MachineProductivity;
use App\Repositories\BaseRepository;

/**
 * Class MachineProductivityRepository
 * @package App\Repositories\Manufacture
 * @version October 24, 2022, 10:18 am WIB
*/

class MachineProductivityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'machine_id',
        'shiftment_id',
        'work_date',
        'capacity',
        'capacity_uom_id',
        'duration_target',
        'duration_off',
        'amount_target',
        'amount_result',
        'uom_id'
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
        return MachineProductivity::class;
    }
}
