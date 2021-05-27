<?php

namespace App\Traits;
use Illuminate\Support\Facades\DB;

trait GetActiveAccount {


    public function activeAccount($id)
    {
        $account = DB::table('employee_bank_accounts')->where('employee_id',$id)->where('isActive', true)->get();
        
        return $account;
    }

}