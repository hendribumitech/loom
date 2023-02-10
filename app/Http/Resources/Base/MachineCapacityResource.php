<?php

namespace App\Http\Resources\Base;

use Illuminate\Http\Resources\Json\JsonResource;

class MachineCapacityResource extends JsonResource
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
            'product_id' => $this->product_id,
            'capacity' => $this->capacity,
            'capacity_uom_id' => $this->capacity_uom_id,
            'period_uom_id' => $this->period_uom_id
        ];
    }
}
