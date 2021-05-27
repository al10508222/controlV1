<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\PayrollCreated' => [
            'App\Listeners\ProcessPayroll',
        ],
        'App\Events\ProviderCreated' => [
            'App\Listeners\SendProviderEmail',
        ],
        'App\Events\TransactionCreated' => [
            'App\Listeners\TransactionListener',
        ],
        'App\Events\EventPaymentTransaction' => [
            'App\Listeners\PaymentTransactionListener',
        ],
        'App\Events\ProviderStatus' => [
            'App\Listeners\ProviderStatusListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
