<?php

namespace App\Models\Base;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="MachineCapacity",
 *      required={"machine_id", "product_id", "capacity", "capacity_uom_id", "period_uom_id"},
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
 *          property="product_id",
 *          description="product_id",
 *          type="integer",
 *          format="int32"
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
 *      )
 * )
 */
class MachineCapacity extends Model
{
    use HasFactory;
        use SoftDeletes;

    public $table = 'machine_capacities';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'machine_id',
        'product_id',
        'capacity',
        'capacity_uom_id',
        'period_uom_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'machine_id' => 'integer',
        'product_id' => 'integer',
        'capacity' => 'decimal:2',
        'capacity_uom_id' => 'integer',
        'period_uom_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'machine_id' => 'required',
        'product_id' => 'required',
        'capacity' => 'required|numeric',
        'capacity_uom_id' => 'required',
        'period_uom_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function capacityUom()
    {
        return $this->belongsTo(\App\Models\Base\Uom::class, 'capacity_uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function periodUom()
    {
        return $this->belongsTo(\App\Models\Base\Uom::class, 'period_uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(\App\Models\Base\Product::class, 'product_id');
    }
}
