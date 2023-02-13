<?php

namespace App\Http\Controllers\Manufacture;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Base\MachineRepository;
use App\Repositories\Base\ShiftmentRepository;
use App\Repositories\Manufacture\MachineAvailabilityRepository;

class ResumeMachineAvailabilityController extends AppBaseController
{
    protected $baseRoute = 'manufacture.machineAvailabilities';
    protected $baseView = 'manufacture.machine_availabilities';
    
    public function index(Request $request){
        return view($this->baseView.'.resume')->with($this->getOptionItems());
    }

    private function getOptionItems(){        
        $machine = new MachineRepository();        
        return [
            'baseRoute' => $this->baseRoute,
            'baseView' => $this->baseView,
            'machineItems' => $machine->pluck(),            
        ];
    }

    public function generate(Request $request)
    {
        $period = generatePeriodFromString($request->get('work_date'));
        $startDate = $period['startDate']->format('Y-m-d');
        $endDate = $period['endDate']->format('Y-m-d');
        $machine = $request->get('machine_id');
        $repo = new MachineAvailabilityRepository();
        $shiftList = (new ShiftmentRepository())->pluck();
        $data = $repo->resume(
            [
                'startDate' => $startDate,
                'endDate' => $endDate,
                'machine' => $machine
            ]
        );
        $resume = ['target' => 0, 'available' => 0, 'off' => 0]; 
        $initialDate = $period['startDate'];        
        $events = [];
        $dataInserts = [];
        $eventTimeFormat = [ // like '14:30:00'
            'hour' => '2-digit',
            'minute' =>'2-digit',
            'second' => '2-digit',
            'hour12' => false
        ];
        
        foreach($data as $date => $day){            
            $title = [];
            $durationOffTotal = 0;
            foreach($day as $shift){
                $classLabel = $shift->duration_off > 0 ? 'bg-danger' : 'bg-success';
                $title[] = '<div class="label '.$classLabel.' mb-2">'.$shiftList[$shift->shiftment_id].' target: '.localNumberFormat($shift->duration_target, 1).' -  off: '. localNumberFormat($shift->duration_off, 1).'</div>';                
                $resume['target'] += $shift->duration_target;
                $resume['available'] += $shift->duration_target - $shift->duration_off;
                $resume['off'] += $shift->duration_off;
            }            
            $events[] = [
                'title' => implode('',$title),
                'allDay' => true,
                'start' => $date,
                'color' => 'white'
            ];
        }
                        
        return view($this->baseView.'.resume_calendar', compact('events', 'eventTimeFormat', 'initialDate', 'resume', 'startDate', 'endDate'));
    }
}
