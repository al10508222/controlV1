<?php

namespace App\Exports;

use App\Models\Employee;

use Maatwebsite\Excel\Concerns\FromCollection;

class PaymentExport implements FromCollection
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
        $employees = Employee::with(
            'accounts',
            'employments.contract_type',
            )->find($this->users);

        $collection = collect();
        $row = 1;
        foreach ($employees as $employee) {
            $collection->push([
                str_pad($employee->accounts[0]->clabe, 18, "0", STR_PAD_LEFT),
                str_pad($this->accountNumber, 18, "0", STR_PAD_LEFT),
                "MXP",
                "TODO:monto",
                str_pad($employee->name.$employee->lastname, 40, " "),
                40,
                substr($employee->accounts[0]->clabe, 3),
                "TODO:concepto",
                str_pad($row, 7, "0", STR_PAD_LEFT),
                $this->payday
            ]);
            $row++;
        }
        $this->lastRow = $row;
        return $collection;
    }

    public function startCell(): string
    {
        return 'A1';
    }

    public function title(): string {
        return 'LAYOUT DE PAGOS';
    }

    // public function headings(): array {
        
    //    return [

    //    ]; 

    // }
}
