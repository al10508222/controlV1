<?php

namespace App\Exports;



use PHPExcel_Cell;
use App\Models\Payroll;
use App\Models\CustomPivotOption;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;

use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class PayrollReport implements FromCollection, WithHeadings, WithEvents, ShouldAutoSize, WithCustomStartCell, WithTitle,WithColumnFormatting

{
 
    private $filters;
    private $lastRow;
    private static $ALIGNMENT = '\\PhpOffice\\PhpSpreadsheet\\Style\\Alignment';
    private static $FILL      = '\\PhpOffice\\PhpSpreadsheet\\Style\\Fill';
    private static $BORDER 	  = '\\PhpOffice\\PhpSpreadsheet\\Style\\Border';
    private $lastColumn;
    private $headers;
    private $numberColumn;
    private $hiddenHeaders =  false;

    private $allkeys;
    private $allKeysOnlyOrders;

    public function __construct($filters) {
        $headersReport = $filters['headersReport'];

        $this->filters = $filters;
        $this->lastColumn = null;
        $this->headers = [];
        $this->numberColumn = [];



        $this->allKeysOnlyOrders = isset($filters['allKeysOnlyOrders']) ? $filters['allKeysOnlyOrders'] : [] ; 
        $this->allkeys = isset($filters['allkeys']) ? $filters['allkeys'] : [] ; 
       


        if ($headersReport != true) {
            $this->hiddenHeaders = true;
        } 

        $this->setHeaders();
    }
 

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        try {

            \Log::error($this->filters);
            $allkeys = isset($this->filters['allkeys']) ? $this->filters['allkeys'] : [] ;  
            $catContractTypeId = $this->filters['cat_contract_type_id'];
            $catPeriodicityTypeId = $this->filters['cat_periodicity_type_id'];
            $registers = collect();
            Payroll::orderBy('id', 'asc')
            ->with([
                'cat_contract',
                'catPeriodicity'

            ])
            ->when($catContractTypeId, function ($query, $catContractTypeId) {
                return $query->where('cat_contract_type_id', $catContractTypeId);
            })
            ->when($catPeriodicityTypeId, function ($query, $catPeriodicityTypeId) {
                return $query->where('cat_periodicity_type_id', $catPeriodicityTypeId);
            })
            ->chunk(1000, function (Collection $rows) use (&$registers) {
                $registers = $registers->merge($rows);
            });

            $collection = collect();
            $row = $this->hiddenHeaders === false ? 1 : 0;
            foreach ($registers as $item) {
                $values = [];


                //personalPayroll
                if (in_array('personalPayroll.code', $allkeys)){
                    $values['personalPayroll.code'] = isset($item->code) ? $item->code : STR_PAD_LEFT;
                } 
                if (in_array('personalPayroll.period_days', $allkeys)){
                    $values['personalPayroll.period_days'] = isset($item->period_days) ? $item->period_days : STR_PAD_LEFT;
                } 
                if (in_array('personalPayroll.payment_date', $allkeys)){
                    $values['personalPayroll.payment_date'] = isset($item->payment_date) ? $item->payment_date : STR_PAD_LEFT;
                } 
                if (in_array('personalPayroll.payment_period_start', $allkeys)){
                    $values['personalPayroll.payment_period_start'] = isset($item->payment_period_start) ? $item->payment_period_start : STR_PAD_LEFT;
                } 
                if (in_array('personalPayroll.payment_period_end', $allkeys)){
                    $values['personalPayroll.payment_period_end'] = isset($item->payment_period_end) ? $item->payment_period_end : STR_PAD_LEFT;
                } 
                if (in_array('personalPayroll.payment_period_end', $allkeys)){
                    $values['personalPayroll.payment_period_end'] = isset($item->payment_period_end) ? $item->payment_period_end : STR_PAD_LEFT;
                } 
                if (in_array('personalPayroll.cat_contract_type_id', $allkeys)){
                    $values['personalPayroll.cat_contract_type_id'] = isset($item->cat_contract->name) ? $item->cat_contract->name : STR_PAD_LEFT;
                } 
                if (in_array('personalPayroll.cat_periodicity_type_id', $allkeys)){
                    $values['personalPayroll.cat_periodicity_type_id'] = isset($item->catPeriodicity->name) ? $item->catPeriodicity->name : STR_PAD_LEFT;
                } 



                $orderValues = [];
                foreach($this->allKeysOnlyOrders  as $itemKey){
                    $result = isset($values[$itemKey]) ? $values[$itemKey] : '';
                    if(trim($result) != ""){
                        array_push($orderValues, $result); 
                    }
                }

                

                $resultTwo = array_diff($values, $orderValues);                
                $collection->push(array_merge($orderValues , $resultTwo));
                $row++;
            }
            $this->lastRow = $row;

            return $collection;
        } catch (\Exception $e) {

            \Log::error($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'No se pudo completar la acción' . $e,
                'error' => $e
            ], 500);
        }
        
    }

    public function startCell(): string
    {
        return 'A1';
    }

    public function title(): string {
        return 'Empleados';
    }
    public function setHeaders(){
   
        $allKeysOnlyOrders = $this->allKeysOnlyOrders; 
        $allkeys = $this->allkeys;
        $count = 0;
        $orderItems = $this->filters['allkeys'];
        
        

        
        $headings = [];

        if (in_array('personalPayroll.code', $allkeys)){
            $headings['personalPayroll.code'] = 'Folio' ;
            $count++; 
            array_push($this->numberColumn, $count);        
        }
        if (in_array('personalPayroll.period_days', $allkeys)){
            $headings['personalPayroll.period_days'] = 'Días del periodo' ;
            $count++; 
            array_push($this->numberColumn, $count);        
        }
        if (in_array('personalPayroll.payment_date', $allkeys)){
            $headings['personalPayroll.payment_date'] = 'Fecha de pago' ;
            $count++; 
            array_push($this->numberColumn, $count);        
        }
        if (in_array('personalPayroll.payment_period_start', $allkeys)){
            $headings['personalPayroll.payment_period_start'] = 'Fecha inicio periodo de pago' ;
            $count++; 
            array_push($this->numberColumn, $count);        
        }
        if (in_array('personalPayroll.payment_period_end', $allkeys)){
            $headings['personalPayroll.payment_period_end'] = 'Fecha fin periodo de pago' ;
            $count++; 
            array_push($this->numberColumn, $count);        
        }
        if (in_array('personalPayroll.cat_contract_type_id', $allkeys)){
            $headings['personalPayroll.cat_contract_type_id'] = 'Tipo de contratación' ;
            $count++; 
            array_push($this->numberColumn, $count);        
        }
        if (in_array('personalPayroll.cat_periodicity_type_id', $allkeys)){
            $headings['personalPayroll.cat_periodicity_type_id'] = 'Tipo de nómina' ;
            $count++; 
            array_push($this->numberColumn, $count);        
        }

            $orderValues = [];
            foreach($allKeysOnlyOrders  as $itemKey){
                $result = isset($headings[$itemKey]) ? $headings[$itemKey] : '';
                if(trim($result) != ""){
                    array_push($orderValues, $result); 
                }
            }

        

            $resultTwo = array_diff($headings, $orderValues);     

            $this->lastColumn =  Coordinate::stringFromColumnIndex($count === 0 ? 1 : $count);
            $this->headers = $this->hiddenHeaders === true ? [] : array_merge($orderValues , $resultTwo);//$headings;
            return true;

    }

    public function headings(): array {
        return $this->headers;
    }

    public function registerEvents(): array {
        //dd($this->lastColumn);
        $lastColumn = $this->lastColumn;
        $hiddenHeaders = $this->hiddenHeaders;

        return [
            AfterSheet::class => function(AfterSheet $event) use($lastColumn, $hiddenHeaders){
                $event->sheet->getDelegate()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
               
                if($hiddenHeaders === false){

                 $event->sheet->styleCells(
                    'A1:'.$lastColumn.'1',
                    [
                        'font' => [
                            'bold' => true,
                            'name' => 'Montserrat',
                            'size' => 14
                        ],
                        'alignment' => [
                            'horizontal' => static::$ALIGNMENT::HORIZONTAL_CENTER,
                            'vertical' => static::$ALIGNMENT::VERTICAL_CENTER,
                        ],
                        'fill' => [
                            'fillType' => static::$FILL::FILL_SOLID,
                            'startColor' => [
                                'argb' => 'FFFFFFFF',
                            ]
                        ]
                    ]
                );
                
                $event->sheet->styleCells(
                    'A1:'.$lastColumn.'1',
                    [
                        'font' => [
                            'bold' => true,
                            'name' =>  'Montserrat',
                            'size' =>  14
                        ],
                        'alignment' => [
                            'horizontal' => static::$ALIGNMENT::HORIZONTAL_CENTER,
                            'vertical' => static::$ALIGNMENT::VERTICAL_CENTER,
                        ],
                        'fill' => [
                            'fillType' => static::$FILL::FILL_SOLID,
                            'startColor' => [
                                'argb' => 'FFCCD1D1',
                            ],
                        ]
                    ]
                );
            }

                $event->sheet->styleCells(
                    'A1:'.$lastColumn.$this->lastRow,
                    [
                        'font' => [
                            'name' => 'Montserrat',
                            'size' => 12
                        ],
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => static::$BORDER::BORDER_THIN,
                                'color' => ['argb' => 'FF000000'],
                            ]
                        ]
                    ]
                );

                if($hiddenHeaders === false){ 
                $event->sheet->autoFilter('A1:'.$lastColumn.'1');
                }

                $event->sheet->wrapText('A1:'.$lastColumn.'1');

                if($hiddenHeaders === false){ 
                    $event->sheet->rowHeight('1', 40);
                }
             
                $event->sheet->getStyle('A'. ($hiddenHeaders == false ? 2: 1).':'.$lastColumn.$this->lastRow)
                ->getAlignment()
                ->setWrapText(true);

                
            }
        ];
    }

                        public function columnFormats(): array
                    {
                        $columnArray = [];
                        foreach($this->numberColumn as $number){
                           $columnArray[Coordinate::stringFromColumnIndex($number)] = NumberFormat::FORMAT_NUMBER;
                        }

                        return $columnArray;

                    }
}
