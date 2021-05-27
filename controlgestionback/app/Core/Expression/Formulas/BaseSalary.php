<?php

namespace App\Core\Expression\Formulas;

use App\Core\Contracts\Payroll\iBaseSalary;
use App\Core\Contracts\Payroll\iFormula;

class BaseSalary implements iBaseSalary, iFormula{

    
    private $dailySalary;
    private $days;

    /**
     * @param int
     */
    public function setDays($days){
        $this->days = $days;
        return $this;
    }
    
    /**
     * @param float daily salary with all cents, using decimal point 
     */
    public function setDailySalary($dailySalary)
    {
        $this->dailySalary = round($dailySalary, 2) ;
        return $this;
    }

    /**
     * 
     * @return int base salary
     */
    public function calculate()
    {
        $baseSalary = round($this->dailySalary * $this->days) * 100;
        return $baseSalary;
    }
}