<?php

namespace App\Http\Resources\Manufacture;

use Illuminate\Http\Resources\Json\JsonResource;

class MachineProductivityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'machine_id' => $this->machine_id,
            'shiftment_id' => $this->shiftment_id,
            'work_date' => $this->work_date,
            'capacity' => $this->capacity,
            'capacity_uom_id' => $this->capacity_uom_id,
            'duration_target' => $this->duration_target,
            'duration_off' => $this->duration_off,
            'amount_target' => $this->amount_target,
            'amount_result' => $this->amount_result,
            'uom_id' => $this->uom_id
        ];
    }
}
