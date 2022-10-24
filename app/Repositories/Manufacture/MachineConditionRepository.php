<?php

namespace App\Repositories\Manufacture;

use App\Models\Manufacture\MachineCondition;
use App\Repositories\BaseRepository;
use Carbon\Carbon;

/**
 * Class MachineConditionRepository
 * @package App\Repositories\Manufacture
 * @version October 24, 2022, 10:18 am WIB
*/

class MachineConditionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'machine_id',
        'shiftment_id',
        'work_date',
        'start',
        'end',
        'amount_minutes',
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

    /**
     * Create model record.
     *
     * @param array $input
     *
     * @return Model
     */
    public function create($input)
    {
        $this->model->getConnection()->beginTransaction();
        try {
            $input['amount_minutes'] = Carbon::parse($input['end'])->diffInMinutes(Carbon::parse($input['start']));
            $model = $this->model->newInstance($input);
            $model->save();
            $this->model->getConnection()->commit();
            return $model;
        } catch (\Exception $e) {
            $this->model->getConnection()->rollBack();
            return $e;
        }
        
    }   

    /**
     * Update model record for given id.
     *
     * @param array $input
     * @param int   $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function update($input, $id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        $model->fill($input);

        $model->save();

        return $model;
    }
}
