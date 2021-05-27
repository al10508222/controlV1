<?php

namespace Database\Factories;

use App\Models\{EmployeeBankAccount, Employee};
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeBankAccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeBankAccount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id'               => Employee::factory(),
            'cat_bank_id'               => $this->faker->numberBetween($min = 1, $max = 91),
            'cat_bank_account_type_id'  => 3,
            'clabe'                     => $this->faker->creditCardNumber
        ];
    }
}
