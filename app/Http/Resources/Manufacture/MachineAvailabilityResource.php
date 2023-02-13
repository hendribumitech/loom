<?php

namespace App\Http\Resources\Manufacture;

use Illuminate\Http\Resources\Json\JsonResource;

class MachineAvailabilityResource extends JsonResource
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
            'duration_target' => $this->duration_target,
            'duration_off' => $this->duration_off,
            'uom_id' => $this->uom_id
        ];
    }
}
