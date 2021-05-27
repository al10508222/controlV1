<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
use App\Models\Project;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Catalogs\CatPaymentStatuses;

class PaymentPspReportExport implements FromCollection, WithHeadings ,WithTitle, WithHeadingRow
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
        $projects = $this->request['project'];
        $year = $this->request['year'];
        $month = $this->request['month']['id'];
        $collection = collect();
        $row = 1;
        foreach ($projects as $project){

            $payments = DB::select("select count(payments.id) as total_persons, count(case when payments.cat_payment_status_id = 4 then 1 end) as total_persons_pending, sum(case when payments.cat_payment_status_id = 4 then brute_amount end ) as total_pending_paid, count(case when payments.cat_payment_status_id = 5 then 1 end) as total_persons_paid, sum(case when payments.cat_payment_status_id = 5 then brute_amount end ) as total_paid, sum(brute_amount) as total  , sum(case when payments.cat_payment_status_id = 1  then brute_amount  when payments.cat_payment_status_id = 2  then brute_amount when payments.cat_payment_status_id = 3  then brute_amount when payments.cat_payment_status_id = 7  then brute_amount  when payments.cat_payment_status_id = 8  then brute_amount end ) as total_others, count(case when payments.cat_payment_status_id = 1 then 1 when payments.cat_payment_status_id = 2 then 1 when payments.cat_payment_status_id = 3 then 1 when payments.cat_payment_status_id =7  then 1 when payments.cat_payment_status_id = 8 then 1 end) as total_persons_others   from payments left JOIN contracts ON payments.contract_id = contracts.id where contracts.project_id =".$project['id']." 
            AND payments.service_year = ".$year." AND payments.service_month = ".$month);

            $data = collect();

           if($this->request['month']){
                    $data->push(
                        $this->request['month']['name'],
               );
           }
           if($this->request['year']){
            $data->push(
                $this->request['year'],
                );
            }
            if($this->request['project']){
                    $data->push(
                        $project['FullName'],
                    );
                }
            
            $data->push($payments[0]->total_persons); 
            
            $data->push($payments[0]->total/100,); 
         
            $data->push($payments[0]->total_pending_paid/100,);

            $data->push($payments[0]->total_persons_pending,);

            $data->push($payments[0]->total_paid/100,);

            $data->push($payments[0]->total_persons_paid,);

            $data->push($payments[0]->total_others,);

            $data->push($payments[0]->total_persons_others,);

             $row++;
            $collection->push($data);

        $this->lastRow = $row;
        

        }
        return $collection;
    }

    public function title(): string {
        return 'Pagos';
    }

    public function headings(): array {
            
        $results = array_filter($this->request);

        $headings = $results;

        
        $headings['month']  = 'Mes';
        $headings['year']  = 'Año';
        $headings['project']  = 'Proyecto';
        $headings['persons']  = 'Total de personas';
        $headings['totalAmount']  = 'Total (MONTO)';
        $headings['pending_paid']  = 'Pendiente de pago (MONTO)';
        $headings['pending_paid_persons']  = 'Pendiente de pago (PERSONAS)';
        $headings['paid']  = 'Pagado (MONTO)';
        $headings['paid_persons']  = 'Pagado (PERSONAS)';
        $headings['others_no_paid']  = 'Otros (MONTO)';
        $headings['others']  = 'Otros (PERSONAS)';
        $headings = array_filter($headings);

        return [$headings];
    }
}
