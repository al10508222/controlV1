<?php

namespace Database\Factories;

use App\Models\EmployeeCetification;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeCetificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeCetification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id'  => Employee::factory(),
            'entity'       => $this->faker->company,
            'name'         => $this->faker->jobTitle,
            'description'  => $this->faker->bs,
            'start_date'   => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'expires'      => false,
            'credential_id'=> $this->faker->uuid,
            'url'          => $this->faker->url
        ];
    }

}
