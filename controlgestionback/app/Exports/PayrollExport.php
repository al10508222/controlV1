<?php

namespace App\Exports;

use App\Models\Payroll;
use App\Models\SystemSetting;
use App\Models\ProcessedPayroll;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\ProcessedPayrollConcept;
use App\Models\Catalogs\CatContractType;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;



class PayrollExport implements FromCollection, WithHeadings, WithEvents, ShouldAutoSize, WithCustomStartCell, WithTitle
{
 
    private $id;
    private $catConceptType;
    private $conceptNames;
    private $titlesAll;
    private $titleTypeOne;
    private $lastRow;
    private $lastColumn;
    private $lastColumDefaultHeader;
    private $titlesColumn;
    private $titlesDefault;


    private $titleColorColum;
    private $headers;



    private static $ALIGNMENT = '\\PhpOffice\\PhpSpreadsheet\\Style\\Alignment';
    private static $FILL      = '\\PhpOffice\\PhpSpreadsheet\\Style\\Fill';
    private static $BORDER 	  = '\\PhpOffice\\PhpSpreadsheet\\Style\\Border';

    public function __construct($id, $catConceptType, $conceptNames) {

                $this->id = $id;
                $this->catConceptType = $catConceptType;
                $this->conceptNames = $conceptNames;
                $this->lastColumn = null;
                $this->lastColumDefaultHeader = 0;
                $this->titlesColumn = 0;

                $this->titleColorColum = [];
                
                if(isset($catConceptType) && count($catConceptType) > 0 ){
                    $this->titlesAll = DB::table('processed_payroll_concepts')
                    ->select(DB::raw('DISTINCT processed_payroll_concepts.name, processed_payroll_concepts.cat_concept_type_id'))
                    ->leftJoin('processed_payrolls', 'processed_payrolls.id', '=', 'processed_payroll_concepts.processed_payroll_id')
                    ->where('processed_payrolls.payroll_id', $id)
                    ->whereIn('processed_payroll_concepts.cat_concept_type_id', $catConceptType)
                    ->orderBy('processed_payroll_concepts.cat_concept_type_id', 'asc')
                    ->get()
                    ->toArray();

                    $this->titlesColumn = count($this->titlesAll);
                }
                
                $this->setHeaders();        
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        try {            

            $registers = collect();
            
            $payrolls = ProcessedPayroll::where('payroll_id', $this->id)
            ->with(['concepts','taxableAmount']);

            $payroll = Payroll::where('id', $this->id)->first();

            
            $payrolls->chunk(1000, function (Collection $rows) use (&$registers) {
                $registers = $registers->merge($rows);
            });
            $collection = collect();

            $row = 1;
            foreach ($registers as $pp) {
                $customValues = [];
                $newValues = [];
                $newValues2 = [];

                $valuesA = [
                    $pp->code,
                    $pp->name,
                    ''.$pp->nss,
                    $pp->rfc,
                    ''.$pp->curp,
                    $pp->date_admission,
                    $pp->department,
                    $pp->position,
                    $pp->type_salary
                ];

            
                foreach ($this->conceptNames as $c) {
                    $processedConcept = ProcessedPayrollConcept::where('processed_payroll_id', $pp->id)
                        ->where('name', $c)->first();

                    array_push($customValues, round($processedConcept->amount, 2));
                }

                $merge = array_merge($valuesA, $customValues);
                
                $valuesB = [
                    round($pp->total_perceptions, 2),
                    round($pp->total_deductions, 2),
                    round($pp->total_perceptions - $pp->total_deductions, 2),
                    $pp->bank,
                    ''.$pp->account,
                    $pp->clabe
                ];

                $data = array_merge($merge, $valuesB);

                if(isset($this->catConceptType) && count($this->catConceptType) > 0){
                foreach ($this->titlesAll as $item) { 
                   
                    $processedConcept = ProcessedPayrollConcept::where('processed_payroll_id', $pp->id)
                        ->where('name', $item->name)
                        ->where('cat_concept_type_id', $item->cat_concept_type_id)
                        ->first();

                    array_push($data, round($processedConcept->amount, 2));

                    if(in_array('1', $this->catConceptType) && $item->cat_concept_type_id== 1 ){
                        array_push($data, round($processedConcept->taxable_amount, 2));
                    }
                }
              }
            
            
                                
            
                $collection->push($data);
                $row++;
            }
            $this->lastRow = $row;
            //dd('cole',$collection->toArray());
            return $collection;

        } catch (\Exception $e) {
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
        return 'Eventuales';
    }
    public function setHeaders(){
        $catConceptType = $this->catConceptType;
        $titlesAll = $this->titlesAll;

        
        $titleTypeOne = $this->titleTypeOne;
        $titlesColumn = $this->titlesColumn;
        $titlesDefault = $this->titlesDefault;

        //dd($titlesColumn);
       

        //$totalTitles = $count + $titlesColumn;

        $headingsA = [
            'Clave',
            'Nombre',
            'NSS',
            'RFC',
            'CURP',
            'Fecha de Alta',
            'Departamento',
            'Puesto',
            'Tipo de Salario'
        ];

        $merge = array_merge($headingsA, $this->conceptNames);
        $headings = array_merge($merge, [
            'Total Percepciones',
            'Total Deducciones',
            'Neto a Pagar',
            'Banco',
            'Cuenta',
            'CLABE',
        ]);

        $sub_count = count($headings);
        $this->lastColumDefaultHeader = Coordinate::stringFromColumnIndex($sub_count);
        //dd($sub_count);


            $color = SystemSetting::select('primary','secondary','accent')->get()
            ->toArray();

            if(isset($catConceptType) && count($catConceptType) > 0 ){

        
                foreach ($titlesAll as $item) {
                    //var_dump($color);
                    array_push($headings, $item->name);

                    if($item->cat_concept_type_id== 1){
                        $color = '14A206';
                    }elseif($item->cat_concept_type_id == 2){
                        $color = '5C57CD';
                    }else{
                        $color = 'B0273E';

                    }

                    $sub_count++;
                    array_push($this->titleColorColum , ['colum' =>Coordinate::stringFromColumnIndex($sub_count), 'color'=> $color]);

                    if(in_array('1',$catConceptType ) && $item->cat_concept_type_id == 1 ){
                        $color = '14A206';
                        array_push($headings, $item->name. ' Gravable');
                        $sub_count++;
                        array_push($this->titleColorColum , ['colum' =>Coordinate::stringFromColumnIndex($sub_count), 'color'=> $color]);


                    }
                
            }
                
            }


 
      
            $totalTitles = $sub_count;


                  
        $this->lastColumn =  Coordinate::stringFromColumnIndex($totalTitles);
        $this->headers = $headings;


    
        return true;

    }

    public function headings(): array {
        return $this->headers;
        
    }

    public function registerEvents(): array {
        $lastColumn = $this->lastColumn;
        $lastColumDefaultHeader = $this->lastColumDefaultHeader;

        $titleColorColum = $this->titleColorColum;

        return [
            AfterSheet::class => function(AfterSheet $event) use($lastColumn, $titleColorColum, $lastColumDefaultHeader){
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
                    'A1:'.$lastColumDefaultHeader.'1',
                    [
                        'font' => [
                            'bold' => true,
                            'name' =>  'Montserrat',
                            'size' =>  14,
                            'color' => ['argb' => 'FFFFFFFF'],
                        ],
                        'alignment' => [
                            'horizontal' => static::$ALIGNMENT::HORIZONTAL_CENTER,
                            'vertical' => static::$ALIGNMENT::VERTICAL_CENTER,
                        ],
                        'fill' => [
                            'fillType' => static::$FILL::FILL_SOLID,
                            'startColor' => [
                                'argb' => 'FF285C4D',
                            ],
                        ]
                    ]
                );

                foreach($titleColorColum as $colum){

                    $columTmp =  $colum['colum'].'1:'.$colum['colum'].'1';
                   
                    $event->sheet->styleCells(
                        $columTmp,
                        [
                            'font' => [
                                'bold' => true,
                                'name' =>  'Montserrat',
                                'size' =>  14,
                                'color' => ['argb' => 'FFFFFFFF'],
                            ],
                            'alignment' => [
                                'horizontal' => static::$ALIGNMENT::HORIZONTAL_CENTER,
                                'vertical' => static::$ALIGNMENT::VERTICAL_CENTER,
                            ],
                            'fill' => [
                                'fillType' => static::$FILL::FILL_SOLID,
                                'startColor' => [
                                    'argb' => $colum['color'],
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

                $event->sheet->styleCells(
                    'J2:T'.$this->lastRow,
                    [
                        'font' => [
                            'name' => 'Montserrat',
                            'size' => 12
                        ],
                        'alignment' => [
                            'horizontal' => static::$ALIGNMENT::HORIZONTAL_RIGHT,
                            'vertical' => static::$ALIGNMENT::VERTICAL_CENTER,
                        ],
                    ]
                );

                // J2:T
                $event->sheet->autoFilter('A1:'.$lastColumn.'1');
                //$event->sheet->wrapText('A1:AX1');
                $event->sheet->rowHeight('1', 40);
                $event->sheet->wrapText(true);
                //$event->sheet->getAlignment();
            
            }
        ];
    }
}
