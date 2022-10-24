<?php

namespace App\Http\Requests\API\Manufacture;

use App\Models\Manufacture\MachineProductivity;
use InfyOm\Generator\Request\APIRequest;

class UpdateMachineProductivityAPIRequest extends APIRequest
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
        $rules = MachineProductivity::$rules;
        
        return $rules;
    }
}
