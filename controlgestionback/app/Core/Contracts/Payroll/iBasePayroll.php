<?php
namespace App\Core\Contracts\Payroll;

interface iBasePayroll {

    public function setYear($year);
    public function setTypePayrollId($id);
    public function setBaseSalary($baseSalary);
    public function calculate(); //compute the operation
}