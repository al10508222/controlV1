<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'                      => $this->faker->name,
            'lastname'                  => $this->faker->lastName,
            'code'                      => $this->faker->unique()->numberBetween($min=1, $max=$this->count*2),
            'email'                     => $this->faker->unique()->safeEmail,
            'second_lastname'           => $this->faker->lastName,
            'rfc'                       => $this->faker->ean13,
            'curp'                      => $this->faker->ean13,
            'nss'                       => $this->faker->randomNumber($nbDigits =null , $strict = false),
            'cat_gender_id'             => $this->faker->numberBetween($min = 1, $max = 2),
            'cat_country_id'            => 142,
            'cat_state_id'              => $this->faker->numberBetween($min=2427, $max=2459),
            'cat_marital_status_id'     => $this->faker->numberBetween($min=1, $max=6),
            'cat_educational_level_id'  => $this->faker->numberBetween($min=1, $max=6),
            'skills'                    => "{'comer', 'dormir'}",
            'telephone'                 => $this->faker->tollFreePhoneNumber,
            'cellphone'                 => $this->faker->tollFreePhoneNumber,
            'emergency_telephone'       => $this->faker->phoneNumber,
            'birthdate'                 => $this->faker->date($format = 'Y-m-d', $max = 'now')

        ];
    }


}
