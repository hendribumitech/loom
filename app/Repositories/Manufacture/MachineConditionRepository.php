<?php

namespace App\Repositories\Manufacture;

use App\Models\Manufacture\MachineAvailability;
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
            // add duration off to machine availability
            $this->updateDurationOffAvailabilty($model->machine_id, $model->shiftment_id, $model->getRawOriginal('work_date')->format('Y-m-d'), minuteToHour($input['amount_minutes']));            
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
        $this->model->getConnection()->beginTransaction();
        try {
            $input['amount_minutes'] = Carbon::parse($input['end'])->diffInMinutes(Carbon::parse($input['start']));
            $query = $this->model->newQuery();
            $model = $query->findOrFail($id);
            $oldModel = clone $model; 
            \Log::error($oldModel->toArray());           
            $model->fill($input);
            $model->save();
            // add duration off to machine availability
            $amountMinute = $input['amount_minutes'];
            $this->updateDurationOffAvailabilty($oldModel->machine_id, $oldModel->shiftment_id, $oldModel->getRawOriginal('work_date'), minuteToHour(-1 * $amountMinute));
            $this->updateDurationOffAvailabilty($model->machine_id, $model->shiftment_id, $model->getRawOriginal('work_date'), minuteToHour($amountMinute));
            $this->model->getConnection()->commit();
            return $model;
        } catch (\Exception $e) {
            $this->model->getConnection()->rollBack();
            return $e;
        }
    }

    private function updateDurationOffAvailabilty($machineId, $shiftmentId, $workDate, $amount){
        // add duration off to machine availability
        $machineAvailability = MachineAvailability::where(['machine_id' => $machineId, 'work_date' => $workDate, 'shiftment_id' => $shiftmentId])->first();
        if($machineAvailability){
            $durationOff = $machineAvailability->getRawOriginal('duration_off');
            $newDurationOff = $durationOff + $amount;
            if($newDurationOff < 0){
                $newDurationOff = 0;
            }
            $machineAvailability->duration_off =  $newDurationOff;
            $machineAvailability->save();
        }
    }
}
