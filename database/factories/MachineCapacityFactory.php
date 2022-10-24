<?php

namespace Database\Factories\Base;

use App\Models\Base\MachineCapacity;
use Illuminate\Database\Eloquent\Factories\Factory;

class MachineCapacityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MachineCapacity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'machine_id' => $this->faker->word,
        'product_id' => $this->faker->word,
        'capacity' => $this->faker->numberBetween(0, 9223372036854775807),
        'capacity_uom_id' => $this->faker->word,
        'period_uom_id' => $this->faker->word
        ];
    }
}
