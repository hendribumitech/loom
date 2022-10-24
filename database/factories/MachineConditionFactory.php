<?php

namespace Database\Factories\Manufacture;

use App\Models\Manufacture\MachineCondition;
use Illuminate\Database\Eloquent\Factories\Factory;

class MachineConditionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MachineCondition::class;

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
        'start' => $this->faker->date('Y-m-d H:i:s'),
        'end' => $this->faker->date('Y-m-d H:i:s'),
        'amount_minutes' => $this->faker->numberBetween(0, 9223372036854775807),
        'description' => $this->faker->text($this->faker->numberBetween(5, 200))
        ];
    }
}
