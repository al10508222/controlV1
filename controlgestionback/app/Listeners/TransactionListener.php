<?php

namespace App\Listeners;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\CatTransactionTypes;

class TransactionListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->cat_transaction_type_id = CatTransactionTypes::CREATED;
        $transaction->action = 'crear un empleado';
        $transaction->save();
    }
}
