<?php

namespace App\Repositories\Manufacture;

use App\Models\Manufacture\MachineResult;
use App\Repositories\BaseRepository;

/**
 * Class MachineResultRepository
 * @package App\Repositories\Manufacture
 * @version October 22, 2022, 10:35 pm WIB
*/

class MachineResultRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'machine_id',
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
