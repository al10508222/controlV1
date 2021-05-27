<?php
namespace App\Core\Expression\Formulas;

use App\Core\Contracts\Payroll\iFormula;

class IMSS implements iFormula{

    private $uma;
    private $contributionBaseSalary;
    private $amountEmployer = 0;
    private $amountWorker = 0;
    private $monthlyEmployer = 0;
    private $bimonthlyEmployer = 0;
    private $monthlyWorker = 0;
    private $bimonthlyWorker = 0;
    private $infonavit = 0;
    private $workedDays;

    /**
     * @param float uma
    */
    public function setUma($uma)
    {
        $this->uma = $uma;
        return $this;
    }

    /**
    * @param float contributionBaseSalary
    */
    public function setContributionBaseSalary($contributionBaseSalary)
    {
        $this->contributionBaseSalary = round($contributionBaseSalary, 2);
        return $this;
    }

    /**
    * @param float workedDays
    */
    public function setWorkedDays($workedDays)
    {
        $this->workedDays = $workedDays;
        return $this;
    }

    /**
    * Seek / motherhood  - Presentation benefits in kind fixed fee
    * @param float employerFee
    */
    public function benefitsInKindFixedFee($employerFee)
    {
        $data = ($employerFee * $this->uma) * $this->workedDays;
        $this->amountEmployer = $this->amountEmployer + $data;
        $this->monthlyEmployer = $this->monthlyEmployer + $data;

        return $this;
    }

    /**
    * Seek / motherhood
    * @param float employerFee workerFee
    */
    public function feeExcess($employerFee, $workerFee)
    {
        if($this->contributionBaseSalary > (3 * $this->uma) ){
            $employer = ( $employerFee * ( $this->contributionBaseSalary - (3 * $this->uma) ) )  * $this->workedDays;
            $this->amountEmployer = $this->amountEmployer + $employer;
            $this->monthlyEmployer = $this->monthlyEmployer + $employer;

            $worker = ( $workerFee * ( $this->contributionBaseSalary - (3 * $this->uma) ) )  * $this->workedDays;
            $this->amountWorker = $this->amountWorker + $worker;
            $this->monthlyWorker = $this->monthlyWorker + $worker;
        }
        return $this;
    }

    /**
    * Seek / motherhood
    * @param float employerFee workerFee
    */
    public function cashBenefits($employerFee, $workerFee)
    {
        $employer = ($employerFee * $this->contributionBaseSalary) * $this->workedDays;
        $this->amountEmployer = $this->amountEmployer + $employer;
        $this->monthlyEmployer = $this->monthlyEmployer + $employer;


        $worker = ($workerFee * $this->contributionBaseSalary) * $this->workedDays;
        $this->amountWorker = $this->amountWorker + $worker;
        $this->monthlyWorker = $this->monthlyWorker + $worker;

        return $this;

    }

    /**
    * Seek / motherhood
    * @param float employerFee workerFee
    */
    public function pensionersBeneficiaries($employerFee, $workerFee)
    {
        $employer = ($employerFee * $this->contributionBaseSalary) * $this->workedDays;
        $this->amountEmployer = $this->amountEmployer + $employer;
        $this->monthlyEmployer = $this->monthlyEmployer + $employer;

        $worker = ($workerFee * $this->contributionBaseSalary) * $this->workedDays;
        $this->amountWorker = $this->amountWorker + $worker;
        $this->monthlyWorker = $this->monthlyWorker + $worker;

        return $this;
    }

    /**
    * 
    * @param float employerFee workerFee
    */
    public function disabilityAndLife($employerFee, $workerFee)
    {
        $employer = ($employerFee * $this->contributionBaseSalary) * $this->workedDays;
        $this->amountEmployer = $this->amountEmployer + $employer;
        $this->monthlyEmployer = $this->monthlyEmployer + $employer;

        $worker = ($workerFee * $this->contributionBaseSalary) * $this->workedDays;
        $this->amountWorker = $this->amountWorker + $worker;
        $this->monthlyWorker = $this->monthlyWorker + $worker;

        return $this;
    }

    /** 
    * @param float employerFee 
    */
    public function daycareSocialBenefits($employerFee)
    {
        $employer = ($employerFee * $this->contributionBaseSalary) * $this->workedDays;
        $this->amountEmployer = $this->amountEmployer + $employer;
        $this->monthlyEmployer = $this->monthlyEmployer + $employer;

        return $this;
    }

    /**
    * @param float employerFee 
    */
    public function occupationalRisk($employerFee)
    {
        $employer = ($employerFee * $this->contributionBaseSalary) * $this->workedDays;
        $this->amountEmployer = $this->amountEmployer + $employer;
        $this->monthlyEmployer = $this->monthlyEmployer + $employer;

        return $this;
    }

    /**
    * @param float employerFee
    */
    public function retirementInsurance($employerFee)
    {
        $employer = ($employerFee * $this->contributionBaseSalary) * $this->workedDays;
        $this->amountEmployer = $this->amountEmployer + $employer;
        $this->bimonthlyEmployer = $this->bimonthlyEmployer + $employer;
        return $this;
    }

    /**
    * @param float employerFee workerFee
    */
    public function unemploymentAndOldAge($employerFee, $workerFee)
    {
        $employer = ($employerFee * $this->contributionBaseSalary) * $this->workedDays;
        $this->amountEmployer = $this->amountEmployer + $employer;
        $this->bimonthlyEmployer = $this->bimonthlyEmployer + $employer;

        $worker = ($workerFee * $this->contributionBaseSalary) * $this->workedDays;
        $this->amountWorker = $this->amountWorker + $worker;
        $this->bimonthlyWorker = $this->bimonthlyWorker + $worker;

        return $this;
    }

    /**
    * @param float employerFee 
    */
    public function infonavit($employerFee)
    {
        $employer = ($employerFee * $this->contributionBaseSalary) * $this->workedDays;
        $this->amountEmployer = $this->amountEmployer + $employer;
        $this->infonavit = $employer;

        return $this;
    }

    /**
    * @return standarObj key => amountEmployer , amountEmployer
    */
    public function calculate()
    {
        return [
            "employer" => [
                "total_amountEmployer"  => round($this->amountEmployer, 2) / 100,
                "imss_monthly"          => round($this->monthlyEmployer) / 100,
                "imss_bimonthly"        => round($this->bimonthlyEmployer) / 100,
                "infonavit"             => round($this->infonavit) / 100
            ],
            "worker"   => [
                "total_amountWorker"   => round($this->amountWorker, 2) / 100,
                "imss_monthly"         => round($this->monthlyWorker, 2) / 100,
                "imss_bimonthly"       => round($this->bimonthlyWorker, 2) / 100,

            ]
        ];
    }
    
}

?>