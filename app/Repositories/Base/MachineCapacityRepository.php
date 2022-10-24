<?php

namespace App\Repositories\Base;

use App\Models\Base\MachineCapacity;
use App\Repositories\BaseRepository;

/**
 * Class MachineCapacityRepository
 * @package App\Repositories\Base
 * @version October 24, 2022, 3:51 pm WIB
*/

class MachineCapacityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'machine_id',
        'product_id',
        'capacity',
        'capacity_uom_id',
        'period_uom_id'
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
        return MachineCapacity::class;
    }
}
