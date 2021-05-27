<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\EmployeeAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeAddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeAddress::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cat_state_id' => $this->faker->numberBetween($min=2427, $max=2459),
            'employee_id'  => Employee::factory(),
            'town'         => $this->faker->state,
            'neighborhood' => $this->faker->citySuffix,
            'city'         => $this->faker->city,
            'zipcode'      => $this->faker->postcode,
            'street'       => $this->faker->streetName,
            'ext_num'      => $this->faker->buildingNumber,
            'int_num'      => $this->faker->buildingNumber,
        ];
    }
}
