<?php

namespace Database\Factories\Base;

use App\Models\Base\Machine;
use Illuminate\Database\Eloquent\Factories\Factory;

class MachineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Machine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->text($this->faker->numberBetween(5, 10)),
        'name' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'capacity' => $this->faker->numberBetween(0, 9223372036854775807),
        'capacity_uom_id' => $this->faker->word,
        'period_uom_id' => $this->faker->word,
        'description' => $this->faker->text($this->faker->numberBetween(5, 100)),
        'types' => $this->faker->text($this->faker->numberBetween(5, 15))
        ];
    }
}
