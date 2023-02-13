<?php

namespace Database\Factories\Manufacture;

use App\Models\Manufacture\MachineAvailability;
use Illuminate\Database\Eloquent\Factories\Factory;

class MachineAvailabilityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MachineAvailability::class;

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
        'duration_target' => $this->faker->numberBetween(0, 9223372036854775807),
        'duration_off' => $this->faker->numberBetween(0, 9223372036854775807),
        'uom_id' => $this->faker->word
        ];
    }
}
