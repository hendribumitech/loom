<?php

namespace App\Models\Base;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Shiftment",
 *      required={"code", "name", "start_hour", "end_hour"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="code",
 *          description="code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="capacity",
 *          description="capacity",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="capacity_uom_id",
 *          description="capacity_uom_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="period_uom_id",
 *          description="dalam satuan jam, hari atau lainnya",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="types",
 *          description="tipe uom, misalkan berat, luas, satuan dll",
 *          type="string"
 *      )
 * )
 */
class Shiftment extends Model
{
    use HasFactory;
        use SoftDeletes;

    public $table = 'shiftments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'code',
        'name',
        'start_hour',
        'end_hour',
        'overday'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'name' => 'string',
        'overday' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required|string|max:10',
        'name' => 'required|string|max:50',
        'start_hour' => 'required',
        'end_hour' => 'required',
        'overday' => 'nullable|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function machineConditions()
    {
        return $this->hasMany(\App\Models\Base\MachineCondition::class, 'shiftment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function machineProductivities()
    {
        return $this->hasMany(\App\Models\Base\MachineProductivity::class, 'shiftment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function machineResults()
    {
        return $this->hasMany(\App\Models\Base\MachineResult::class, 'shiftment_id');
    }
}
