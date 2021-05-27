<?php
namespace App\Core\Expression\Formulas;

use App\Core\Contracts\Payroll\iBasePayroll;
use App\Core\Contracts\Payroll\iFormula;
use App\Models\PayrollIsrConfig;

class ISR implements iBasePayroll, iFormula{

    private $year;
    private $payrollId;  
    private $baseSalary;

    /**
     * @param int
     */
    public function setYear($year){
        $this->year = $year;
        return $this;
    }

    /**
     * @param int
     */
    public function setTypePayrollId($payrollId){
        $this->payrollId = $payrollId;
        return $this;
    }


    public function setBaseSalary($baseSalary)
    {
        $this->baseSalary = $baseSalary;
        return $this;
    }

    /**
     * 
     * @return int ISR in pesos
     */
    public function calculate()
    {
        
        $isrConfig = PayrollIsrConfig::where([
            ['cat_periodicity_type_id', $this->payrollId],
            ['year', $this->year ]
        ])->with(['isrWithholdings' => function($q) {
            $q->where('lower_limit', '<', $this->baseSalary);
            $q->where('upper_limit', '>', $this->baseSalary);
        }])->first();
        
        $entryExceeds = $this->baseSalary - $isrConfig->isrWithholdings[0]->lower_limit;

        $impuesto_marginal = ( $entryExceeds * $isrConfig->isrWithholdings[0]->percent_over_lower_limit ) / 100;
        
        $isr  = $impuesto_marginal + $isrConfig->isrWithholdings[0]->fixed_fee;
        return $isr / 100 ;
    }
    
}

?>