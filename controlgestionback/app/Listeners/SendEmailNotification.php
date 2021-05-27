<?php

namespace App\Listeners;

use App\Events\PayrollCreated;
use App\Models\Catalogs\CatPayrollStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PrePayrollCreated  $event
     * @return void
     */
    public function handle(PayrollCreated $event)
    {
        // WARNING: The following code is completely HARCODED and will not be the real code
        $event->payroll->cat_payroll_status_id = CatPayrollStatus::PROCESSED; // Update the payroll status after process
        
        error_log(print_r($event->payroll, true));
    }
}
