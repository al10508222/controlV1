<?php 

namespace App\Core\Expression\Formulas;

use App\Core\Contracts\Payroll\iFormula;

class ContributionBaseSalary implements iFormula {

    private $uma;
    private $dailySalary;
    private $holidays;
    private $chrismasBonusDays;
    private $vacationPercentage;
    private $intregrationFactor;
    private $days = 365;

    /**
     * @param float
     */
    public function setUma($uma)
    {
        $this->uma = $uma;
        return $this;
    }

    /**
     * @param float
     */
    public function setDailySalary($dailySalary)
    {
        $this->dailySalary = round($dailySalary, 2);
        return $this;
    }

    /**
     * @param int
    */
    public function setHolidays($holidays)
    {
        $this->holidays = $holidays;
        return $this;
    }

    /**
     * @param int
    */
    public function setChrismasBonus($chrismasBonusDays)
    {
        $this->chrismasBonusDays = $chrismasBonusDays;
        return $this;
    }

    /**
     * @param float
    */
    public function setVacationPercentage($vacationPercentage)
    {
        $this->vacationPercentage = $vacationPercentage;
        return $this;
    }

    /**
     *  @param float
    */
    public function setIntregrationFactor()
    {
        $factor = ( $this->days + $this->chrismasBonusDays + ($this->holidays * $this->vacationPercentage) ) / $this->days;
        $upperLimit = 25 * $this->uma;
        if($factor > $upperLimit){
            $this->intregrationFactor = $upperLimit;
        }
        $this->intregrationFactor = $factor;
        return $this;
    } 

    /**
     * @return float Contribution base salary
     */
    public function calculate()
    {
        $sbc = $this->intregrationFactor * $this->dailySalary;
        return $sbc;
    }


}