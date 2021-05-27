<?php

namespace App\Traits;

trait CalculateTaxes {


    public function iva($payment)
    {
        $iva = number_format((float)(($payment/100) * 0.16), 2, '.', '') * 100;
        
        return $iva;
    }

    public function ivaRetention($payment)
    {
        $iva_retention = number_format((float)(($payment/100) * 0.106667), 2, '.', '') * 100;
        
        return $iva_retention;
    }
    
    public function isrRetention($payment)
    {
        $isr_retention = number_format((float)(($payment/100) * 0.10), 2, '.', '') * 100;
        
        return $isr_retention;
    }
}