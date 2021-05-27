<?php
namespace App\Core\Contracts\Payroll;

interface iBaseSalary {

    public function setDailySalary($salary); //define the daily pay
    public function setDays($days);

}