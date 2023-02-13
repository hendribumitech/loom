<?php

namespace App\Http\Requests\Manufacture;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Manufacture\MachineAvailability;

class CreateMachineAvailabilityRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $permissionName = 'machine_availabilities-create';
        return Auth::user()->can($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = MachineAvailability::$rules;
        $rules['shiftment_id'] = 'nullable';
        $rules['duration_target'] = 'nullable';
        $rules['uom_id'] = 'nullable';
        return $rules;
    }

    /**
     * Get all of the input based value from property fillable  in model and files for the request.
     *
     * @param null|array|mixed $keys
     *
     * @return array
    */
    public function all($keys = null){
        $keys = (new MachineAvailability)->fillable;
        return parent::all($keys);
    }
}
