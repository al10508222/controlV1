<?php

namespace Database\Factories;

use App\Models\{Employment, Employee, Position};
use Illuminate\Database\Eloquent\Factories\Factory;

class EmploymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cat_employment_type_id'     => $this->faker->numberBetween($min=1, $max=4),
            'cat_contract_type_id'       => 2,
            'cat_unit_id'                => $this->faker->numberBetween($min=1, $max=18),
            'cat_employment_location_id' => $this->faker->numberBetween($min = 1, $max = 2),
            'cat_employment_client_id'   => $this->faker->numberBetween($min = 1, $max = 3),
            'employee_id'                => Employee::factory(),
            'position_id'                => Position::factory(),
            'has_kit'                    => true,
            'date'                       => $this->faker->date($format = 'Y-m-d', $max = 'now')
        ];
    }
}
