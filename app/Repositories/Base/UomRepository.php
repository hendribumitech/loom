<?php

namespace App\Repositories\Base;

use App\Models\Base\Uom;
use App\Repositories\BaseRepository;

/**
 * Class UomRepository
 * @package App\Repositories\Base
 * @version October 22, 2022, 10:34 pm WIB
*/

class UomRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name',
        'category',
        'types',
        'ratio'
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
        return Uom::class;
    }
}
