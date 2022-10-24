<?php

namespace App\Models\Manufacture;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="MachineProductivity",
 *      required={"machine_id", "shiftment_id", "work_date", "capacity", "capacity_uom_id", "duration_target", "amount_target", "amount_result", "uom_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="machine_id",
 *          description="machine_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="shiftment_id",
 *          description="shiftment_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="work_date",
 *          description="work_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="amount",
 *          description="amount",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="uom_id",
 *          description="uom_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class MachineProductivity extends Model
{
    use HasFactory;
        use SoftDeletes;

    public $table = 'machine_productivity';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'machine_id',
        'shiftment_id',
        'work_date',
        'capacity',
        'capacity_uom_id',
        'duration_target',
        'duration_off',
        'amount_target',
        'amount_result',
        'uom_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'machine_id' => 'integer',
        'shiftment_id' => 'integer',
        'work_date' => 'date',
        'capacity' => 'decimal:2',
        'capacity_uom_id' => 'integer',
        'duration_target' => 'decimal:2',
        'duration_off' => 'decimal:2',
        'amount_target' => 'decimal:2',
        'amount_result' => 'decimal:2',
        'uom_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'machine_id' => 'required',
        'shiftment_id' => 'required',
        'work_date' => 'required',
        'capacity' => 'required|numeric',
        'capacity_uom_id' => 'required',
        'duration_target' => 'required|numeric',
        'duration_off' => 'nullable|numeric',
        'amount_target' => 'required|numeric',
        'amount_result' => 'required|numeric',
        'uom_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function uom()
    {
        return $this->belongsTo(\App\Models\Base\Uom::class, 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function machine()
    {
        return $this->belongsTo(\App\Models\Base\Machine::class, 'machine_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function shiftment()
    {
        return $this->belongsTo(\App\Models\Base\Shiftment::class, 'shiftment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function capacityUom()
    {
        return $this->belongsTo(\App\Models\Base\Uom::class, 'capacity_uom_id');
    }
}
