<?php

namespace App\Repositories\Manufacture;

use App\Models\Manufacture\MachineResult;
use App\Repositories\BaseRepository;

/**
 * Class MachineResultRepository
 * @package App\Repositories\Manufacture
 * @version October 24, 2022, 10:18 am WIB
*/

class MachineResultRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'machine_id',
        'shiftment_id',
        'work_date',
        'amount',
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
        return MachineResult::class;
    }
}
