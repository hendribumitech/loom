<?php

namespace App\Http\Requests\API\Manufacture;

use App\Models\Manufacture\MachineAvailability;
use InfyOm\Generator\Request\APIRequest;

class UpdateMachineAvailabilityAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = MachineAvailability::$rules;
        
        return $rules;
    }
}
