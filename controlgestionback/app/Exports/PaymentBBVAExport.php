<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class PaymentBBVAExport implements FromCollection
{
    private $users;
    private $payday;
    private $accountNumber;

    public function __construct(array $users = [], string $payday = 'H', string $accountNumber) {
        $this->users           = $users;
        $this->payday          = $payday;
        $this->accountNumber   = $accountNumber;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
    }

    public function startCell(): string
    {
        return 'A1';
    }

    public function title(): string {
        return 'LAYOUT DE PAGOS BBVA';
    }
}
