<?php

namespace App\Http\Resources\Base;

use Illuminate\Http\Resources\Json\JsonResource;

class MachineResource extends JsonResource
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
            'code' => $this->code,
            'name' => $this->name,
            'capacity' => $this->capacity,
            'capacity_uom_id' => $this->capacity_uom_id,
            'period_uom_id' => $this->period_uom_id,
            'description' => $this->description,
            'types' => $this->types
        ];
    }
}
