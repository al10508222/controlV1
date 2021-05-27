<?php

namespace App\Imports;

use App\Models\Contract;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ContractsImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        return Contract::all();
        // $arry = [];
        // $contracts = (object)[];
        //     foreach ($rows as $row) 
        //     {
        //         if($row[0]!= null){
        //             if($row[0]!= 'RFC'){
                        
        //                 $contracts->rfc = $row[0];
        //                 $contracts->memo = $row[1];
        //                 $contracts->folio = $row[2];

        //                 $contracts->contrato = $row[3];
        //                 $contracts->contractNumber = $row[4];
        //                 $contracts->proyect = $row[5];
        //                 $contracts->startDate = $row[6];
        //                 $contracts->endDate = $row[7];
        //                 $contracts->amount = $row[8];
        //                 $contracts->anticipatedDate = $row[9];
        //                 $contracts->note = $row[10];

        //                 $arry[] = $contracts;

        //             }
        //         }
                          
                
        //     }
        //     return $arry;
    
        
    }
}
