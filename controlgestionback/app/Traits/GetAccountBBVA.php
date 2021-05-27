<?php

namespace App\Traits;

trait GetAccountBBVA {


    public function BBVAAccount($account)
    {
        $bbva = substr($account, 7, -1);
        
        return $bbva;
    }

    
}