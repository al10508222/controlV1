<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\EmployeeWorkExperience;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeWorkExperienceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeWorkExperience::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id'   => Employee::factory(),
            'company'       => $this->faker->company,
            'position'      => $this->faker->jobTitle,
            'description'   => $this->faker->catchPhrase,
            'start_date'    => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'achievements'  => "{['comer']}",
            'end_date'      => $this->faker->date($format = 'Y-m-d', $max = 'now')
        ];
    }
}
