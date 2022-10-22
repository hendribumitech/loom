<?php

namespace App\Repositories\Manufacture;

use App\Models\Manufacture\MachineCondition;
use App\Repositories\BaseRepository;

/**
 * Class MachineConditionRepository
 * @package App\Repositories\Manufacture
 * @version October 22, 2022, 10:35 pm WIB
*/

class MachineConditionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'machine_id',
        'shiftment_id',
        'start',
        'end',
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
        return MachineCondition::class;
    }
}
