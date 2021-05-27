<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\{EmployeeAddress, 
                EmployeeBankAccount, 
                EmployeeCertification, 
                EmployeeContact, 
                EmployeeEducationExperience, 
                EmployeeWorkExperience, 
                Employment};
use Illuminate\Database\Seeder;


class EmployeeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::factory()
                    ->has(EmployeeAddress::factory()->count(2), 'addresses')
                    ->has(EmployeeWorkExperience::factory()->count(2), 'jobs')
                    ->has(EmployeeEducationExperience::factory()->count(2), 'education')
                    //->has(EmployeeCertification::factory()->count(2), 'certifications')
                    ->has(EmployeeBankAccount::factory()->count(1), 'accounts')
                    ->has(EmployeeContact::factory()->count(1), 'contact')
                    ->has(Employment::factory()->count(1), 'employments')
                    ->count(env('EMPLOYEE_SEEDER_COUNT',5))
                    ->create();
    }
}
