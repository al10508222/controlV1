<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\EmployeeContact;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeContact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->name,
            'phone'       => $this->faker->phoneNumber,
            'employee_id' => Employee::factory()
        ];
    }
}
