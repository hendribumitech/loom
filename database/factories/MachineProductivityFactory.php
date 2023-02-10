<?php

namespace Database\Factories\Manufacture;

use App\Models\Manufacture\MachineProductivity;
use Illuminate\Database\Eloquent\Factories\Factory;

class MachineProductivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MachineProductivity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'machine_id' => $this->faker->word,
        'shiftment_id' => $this->faker->word,
        'work_date' => $this->faker->date('Y-m-d'),
        'capacity' => $this->faker->numberBetween(0, 9223372036854775807),
        'capacity_uom_id' => $this->faker->word,
        'duration_target' => $this->faker->numberBetween(0, 9223372036854775807),
        'duration_off' => $this->faker->numberBetween(0, 9223372036854775807),
        'amount_target' => $this->faker->numberBetween(0, 9223372036854775807),
        'amount_result' => $this->faker->numberBetween(0, 9223372036854775807),
        'uom_id' => $this->faker->word
        ];
    }
}
