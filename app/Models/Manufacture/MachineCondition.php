<?php

namespace App\Models\Manufacture;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="MachineCondition",
 *      required={"machine_id", "shiftment_id", "start", "end"},
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
class MachineCondition extends Model
{
    use HasFactory;
        use SoftDeletes;

    public $table = 'machine_conditions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'machine_id',
        'shiftment_id',
        'start',
        'end',
        'description'
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
        'start' => 'datetime',
        'end' => 'datetime',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'machine_id' => 'required',
        'shiftment_id' => 'required',
        'start' => 'required',
        'end' => 'required',
        'description' => 'nullable|string|max:200'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function machine()
    {
        return $this->belongsTo(\App\Models\Manufacture\Machine::class, 'machine_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function shiftment()
    {
        return $this->belongsTo(\App\Models\Manufacture\Shiftment::class, 'shiftment_id');
    }
}
