<?php

namespace Database\Factories\Base;

use App\Models\Base\Uom;
use Illuminate\Database\Eloquent\Factories\Factory;

class UomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Uom::class;

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
        'category' => $this->faker->text($this->faker->numberBetween(5, 15)),
        'types' => $this->faker->text($this->faker->numberBetween(5, 4096)),
        'ratio' => $this->faker->numberBetween(0, 9223372036854775807)
        ];
    }
}
