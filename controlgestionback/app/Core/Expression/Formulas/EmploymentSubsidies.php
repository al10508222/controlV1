<?php

namespace App\Core\Expression\Formulas;

use App\Core\Contracts\Payroll\iBasePayroll;
use App\Models\PayrollEmploymentSubsidies;


class EmploymentSubsidies implements iBasePayroll{

    private $year;
    private $payrollId;  
    private $baseSalary;
    private $isr;
    
    /**
     * @param int $year
    */
    public function setYear($year){
        $this->year = $year;
        return $this;
    }

    /**
     * @param int $payrollId
    */
    public function setTypePayrollId($payrollId){
        $this->payrollId = $payrollId;
        return $this;
    }

    /**
     * @param float $baseSalary
     */
    public function setBaseSalary($baseSalary)
    {
        $this->baseSalary = $baseSalary;
        return $this;
    }

    /**
     * @param float $isr
    */
    public function setIsr($isr)
    {
        $this->isr = round($isr, 2);
        return $this;
    }

    /**
    * @return float  ISR
    */
    public function calculate()
    {
        $tableSubsidy = PayrollEmploymentSubsidies::where([
            ['cat_periodicity_type_id', $this->payrollId],
            ['year', $this->year ]
        ])->with(['employmentSubsidiesWithholdings' => function($q) {
            $q->where('lower_limit', '<', $this->baseSalary);
            $q->where('upper_limit', '>', $this->baseSalary);
        }])->first();

        if( sizeof($tableSubsidy->employmentSubsidiesWithholdings) > 0 ){
            $employmentSub = ($this->isr * 100 ) - $tableSubsidy->employmentSubsidiesWithholdings[0]->subsidy;
            return $employmentSub / 100 ;
        }
        return 0;
    }

}