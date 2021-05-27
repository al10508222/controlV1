<?php

namespace Database\Factories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

class PositionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Position::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' =>$this->faker->jobTitle,
            'cat_unit_id' => $this->faker->numberBetween($min = 1, $max = 18),
            'cat_tabulator_id' => $this->faker->numberBetween($min = 41, $max = 80),
            'is_available'  => 1 
        ];
    }
}
