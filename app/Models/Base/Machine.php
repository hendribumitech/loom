<?php

namespace App\Models\Base;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Machine",
 *      required={"code", "name", "capacity", "capacity_uom_id", "period_uom_id", "types"},
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
class Machine extends Model
{
    use HasFactory;
        use SoftDeletes;

    public $table = 'machines';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'code',
        'name',
        'capacity',
        'capacity_uom_id',
        'period_uom_id',
        'description',
        'types'
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
        'capacity' => 'decimal:2',
        'capacity_uom_id' => 'integer',
        'period_uom_id' => 'integer',
        'description' => 'string',
        'types' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required|string|max:10',
        'name' => 'required|string|max:50',
        'capacity' => 'required|numeric',
        'capacity_uom_id' => 'required',
        'period_uom_id' => 'required',
        'description' => 'nullable|string|max:100',
        'types' => 'required|string|max:15'
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function machineConditions()
    {
        return $this->hasMany(\App\Models\Base\MachineCondition::class, 'machine_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function machineResults()
    {
        return $this->hasMany(\App\Models\Base\MachineResult::class, 'machine_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function machineRoles()
    {
        return $this->hasMany(\App\Models\Base\MachineRole::class, 'machine_id');
    }
}
