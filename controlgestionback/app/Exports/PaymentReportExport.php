<?php

namespace App\Exports;

use App\Models\Payment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PaymentReportExport implements FromCollection, WithHeadings ,WithTitle, WithHeadingRow
{
    private $request;

    public function __construct(array $request = []) {
       
        $this->request   = $request;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         $payments = Payment::with('status', 'employee', 'contract')->where('service_year', $this->request['year'])->where('service_month',  $this->request['month']['id'])->orderBy('created_at','desc')->get();
        
        $collection = collect();
        $row = 1;

        foreach ($payments as $payment) {
            $data = collect();
            if($this->request['employee_id']){
                    $data->push(
                    $payment->employee->full_name,
                    );
                }
            if($this->request['rfc']){
                $data->push(
                $payment->employee->rfc,
                );
           }
           if($this->request['service_month']){
                    $data->push(
                    $payment->month->name,
               );
           }
           if($this->request['service_year']){
            $data->push(
                $payment->service_year,
                );
            }
            if($this->request['cat_payment_status_id']){
                $data->push(
                    $payment->status->name,
                    );
            }
            if($this->request['memo']){
                $data->push(
                    $payment->contract->HiringMemo->name,
                    );
            }
            if($this->request['project']){
                $data->push(
                    $payment->contract->HiringMemo->Project->FullName,
                    );
            }

            if($this->request['brute_amount']){
                $data->push(
                    $payment->brute_amount,
                    );
            }

            if($this->request['subtotal']){
                $data->push(
                    $payment->subtotal,
                    );
            }

            if($this->request['iva_amount']){
                $data->push(
                    $payment->iva_amount,
                    );
            }

            if($this->request['iva_retention']){
                $data->push(
                    $payment->iva_retention,
                    );
            }

            if($this->request['isr_retention']){
                $data->push(
                    $payment->isr_retention,
                    );
            }

            if($this->request['total_amount']){
                $data->push(
                    $payment->total_amount,
                    );
            }
                    
           $row++;
           $collection->push($data);
       }
        

        //return Payment::all();
        $this->lastRow = $row;
        return $collection;
    }

    public function title(): string {
        return 'Pagos';
    }

    public function headings(): array {
            
        $results = array_filter($this->request);

        $headings = $results;

        if(isset($headings['employee_id'])){
            $headings['employee_id']  = 'Nombre del prestador de servicios';
        }

        if(isset($headings['rfc'])){
            $headings['rfc']  = 'RFC';
        }

        if(isset($headings['service_year'])){
            $headings['service_year']  = 'Año de servicio';
        }

        if(isset($headings['service_month'])){
            $headings['service_month']  = 'Mes de servicio';
        }

        if(isset($headings['cat_payment_status_id'])){
            $headings['cat_payment_status_id']  = 'Estatus de pago';
        }
        if(isset($headings['memo'])){
            $headings['memo']  = 'Memo de contrato';
        }
        if(isset($headings['project'])){
            $headings['project']  = 'Proyecto';
        }
        if(isset($headings['brute_amount'])){
            $headings['brute_amount']  = 'Importe bruto';
        }
        if(isset($headings['subtotal'])){
            $headings['subtotal']  = 'Importe subtotal';
        }
        if(isset($headings['iva_amount'])){
            $headings['iva_amount']  = 'Importe IVA trasladado';
        }
        if(isset($headings['iva_retention'])){
            $headings['iva_retention']  = 'Importe IVA retenido';
        }
        if(isset($headings['isr_retention'])){
            $headings['isr_retention']  = 'Importe ISR retenido';
        }
        if(isset($headings['total_amount'])){
            $headings['total_amount']  = 'Importe total neto';
        }
        
        if(isset($headings['year'])){
            $headings['year']  = '';
        }

        if(isset($headings['month'])){
            $headings['month']  = '';
        }
        
        $headings = array_filter($headings);

        return [$headings];
    }
}
