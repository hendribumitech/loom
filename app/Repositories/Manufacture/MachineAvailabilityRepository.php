<?php

namespace App\Repositories\Manufacture;

use App\Models\Base\Uom;
use App\Models\Manufacture\MachineAvailability;
use App\Models\Manufacture\MachineCondition;
use App\Repositories\Base\ShiftmentRepository;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

/**
 * Class MachineAvailabilityRepository
 * @package App\Repositories\Manufacture
 * @version February 11, 2023, 8:25 am WIB
*/

class MachineAvailabilityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'machine_id',
        'shiftment_id',
        'work_date',
        'duration_target',
        'duration_off',
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
        return MachineAvailability::class;
    }

    public function generate($input){
        $startDate = $input['startDate'];
        $endDate = $input['endDate']; 
        $machines = $input['machine_id'];
        $defaultAvailability = $this->generateDefaultAvailability($startDate, $endDate);
        
        $this->model->getConnection()->beginTransaction();
        $machineOffResume = $this->getMachineOff($machines, $startDate, $endDate);
        try {
            foreach($machines as $machine){
                foreach($defaultAvailability as &$dataMachine){
                    $dataMachine['machine_id'] = $machine;
                    /** duration_off in hours */
                    $key = implode('_',[$machine, $dataMachine['work_date']->format('Y-m-d'), $dataMachine['shiftment_id']]);
                    $resumeMachineOff = $machineOffResume->get($key);
                    $dataMachine['duration_off'] = $resumeMachineOff ? $machineOffResume->get($key)->sum(function($item){
                        return minuteToHour($item->getRawOriginal('amount_minutes'));
                    }) : 0;
                }
                MachineAvailability::upsert($defaultAvailability, ['machine_id', 'shiftment_id', 'work_date']);
            }
    
            (new MachineAvailability())->flushCache();
            $this->model->getConnection()->commit();
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->model->getConnection()->rollBack();

            return $e;
        }
        return $this->model;     
    }

    private function generateDefaultAvailability($startDate, $endDate){
        $result = [];
        $period = CarbonPeriod::create($startDate, $endDate);
        $shift = (new ShiftmentRepository())->all();
        $uom = Uom::whereCode('HR')->first();
        foreach($period as $date){
            $operationHour = 7;
            if($date->dayOfWeek == Carbon::SUNDAY){
                $operationHour = 0;
            }
            if($date->dayOfWeek == Carbon::SATURDAY){
                $operationHour = 5;
            }
            foreach($shift as $s){
                $result[] = [
                    'shiftment_id' => $s->id,
                    'uom_id' => $uom->id,
                    'work_date' => $date,
                    'duration_target' => $operationHour
                ];
            }
        }
        return $result;
    }

    public function resume($data){  
        $model = $this->model->newInstance();      
        $query = $model
            ->disableModelCaching()            
            ->selectRaw('work_date, shiftment_id, sum(duration_target) as duration_target, sum(duration_off) as duration_off')            
            ->whereBetween('work_date', [$data['startDate'], $data['endDate']])
            ->groupBy(['work_date', 'shiftment_id']);
        if($data['machine']){
            $query->whereIn('machine_id', $data['machine']);
        }
        return $query->get()->groupBy(['work_date' => function($item){
            return $item->getRawOriginal('work_date');
        }]);
    }

    private function getMachineOff($machines, $startDate, $endDate){
        $off = MachineCondition::whereIn('machine_id', $machines)
                ->whereBetween('work_date', [$startDate, $endDate])
                ->get()
                ->groupBy(function($item){
                    $key = implode('_',[$item->machine_id, $item->getRawOriginal('work_date'), $item->getRawOriginal('shiftment_id')]);
                    return $key;
                });        
        return $off;
    }
}
