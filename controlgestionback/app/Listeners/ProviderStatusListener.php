<?php

namespace App\Listeners;

use App\Events\ProviderStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProviderInvoiceEmail;

class ProviderStatusListener
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
     * @param  ProviderStatus  $event
     * @return void
     */
    public function handle($event)
    {
        
        Mail::to($event->employee_email)->send(new ProviderInvoiceEmail($event->employee_email,$event->employee_name));
    }
}
