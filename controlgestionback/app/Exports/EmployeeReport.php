<?php

namespace App\Exports;



use PHPExcel_Cell;
use App\Models\Employee;
use App\Models\CustomPivotOption;
use Illuminate\Support\Collection;
use App\Models\Catalogs\CatCustomField;
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

class EmployeeReport implements FromCollection, WithHeadings, WithEvents, ShouldAutoSize, WithCustomStartCell, WithTitle,WithColumnFormatting

{
 
    private $filters;
    private $catCustomField;
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
        $this->catCustomField = CatCustomField::get();
        $this->lastColumn = null;
        $this->headers = [];
        $this->numberColumn = [];



        $this->allKeysOnlyOrders = isset($filters['allKeysOnlyOrders']) ? $this->removePath($filters['allKeysOnlyOrders']) : [] ; 
        $this->allkeys = isset($filters['allkeys']) ? $filters['allkeys'] : [] ; 
       


        if ($headersReport != true) {
            $this->hiddenHeaders = true;
        } 

        $this->setHeaders();
    }
    public function removePath($array){
    
        $collection = collect($array);
        return  $multiplied = $collection->map(function ($item, $key) {
                $tmp = explode(".", $item)[0];
                if($tmp === "personalAdress"){
                    return $tmp;
                } else  if($tmp === "personalExperience"){
                    return $tmp;
                } else  if($tmp === "personalEducation"){
                    return $tmp;  
                } else  if($tmp === "personalCertifications"){
                    return $tmp;
                } else  if($tmp === "personalBank"){
                    return $tmp;
                } else  if($tmp === "personalLabor"){
                    return $tmp;
                }else{
                    return $item;
                }
            })->all();

    }

    public function checkExistsKey($newKey){
        $collection = collect($this->allKeysOnlyOrders);
       return $collection->contains(function ($value, $key) use($newKey){
            return $value ===  $newKey;
        });
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        try {

            \Log::error($this->filters);
            // $personalInformation = isset($this->filters['personalInformation']) ? $this->filters['personalInformation'] : [] ;
            // $personalEmergency = isset($this->filters['personalEmergency']) ? $this->filters['personalEmergency'] : [] ;
            // $personalAdress = isset( $this->filters['personalAdress']) ? $this->filters['personalAdress'] : [] ;
            // $personalExperience = isset($this->filters['personalExperience']) ? $this->filters['personalExperience'] : [] ;
            // $personalEducation = isset($this->filters['personalEducation']) ? $this->filters['personalEducation'] : [] ;
            // $personalCertifications = isset($this->filters['personalCertifications']) ? $this->filters['personalCertifications'] : [] ;     
            // $personalSkills = isset($this->filters['personalSkills']) ? $this->filters['personalSkills'] : [] ;     
            // $personalBank = isset($this->filters['personalBank']) ? $this->filters['personalBank'] : [] ;        
            // $personalLabor = isset($this->filters['personalLabor']) ? $this->filters['personalLabor'] : [] ;  
            $allkeys = isset($this->filters['allkeys']) ? $this->filters['allkeys'] : [] ;  
            $dynamicForm = isset($this->filters['dynamicForm']) ? $this->filters['dynamicForm'] : [] ;
            $catTypeEmployeeId = $this->filters['cat_type_employee_id'];
            $registers = collect();
            Employee::orderBy('id', 'asc')
            ->with([
                'country',
                'gender',
                'maritalStatus',
                'state',
                'contact',
                'addresses.state',
                'jobs',
                'education.status',
                'certifications',
                'accounts.bank',
                'accounts.catBankType',
                'employments',
                'employments.employment_type',
                'employments.contracType',
                'employments.unit',
                'employments.position',
                'employments.location',
                'customField.catCustomField',
            ])
            //->where('type_employee', $catTypeEmployeeId)
            ->when($catTypeEmployeeId, function ($query, $catTypeEmployeeId) {
                return $query->where('type_employee', $catTypeEmployeeId);
            })
            ->chunk(1000, function (Collection $rows) use (&$registers) {
                $registers = $registers->merge($rows);
            });


           
            $collection = collect();
            $row = $this->hiddenHeaders === false ? 1 : 0;
            foreach ($registers as $item) {

                $values = [];


                //personalInformation
                if (in_array('personalInformation.code', $allkeys)){
                   // array_push($values,  $item->code);
                    $values['personalInformation.code'] = isset($item->code) ? $item->code: STR_PAD_LEFT;
                } 
                if (in_array('personalInformation.name', $allkeys)){
                    $values['personalInformation.name'] = isset($item->name) ? $item->name : STR_PAD_LEFT;
                } 
                if (in_array('personalInformation.lastname', $allkeys)){
                    $values['personalInformation.lastname'] = isset($item->lastname) ? $item->lastname : STR_PAD_LEFT;
                }
                if ((in_array('personalInformation.second_lastname', $allkeys))) {
                    $values['personalInformation.second_lastname'] = isset($item->second_lastname) ? $item->second_lastname : STR_PAD_LEFT; 
                }
                if ((in_array('personalInformation.rfc', $allkeys))) {
                    $values['personalInformation.rfc'] = isset($item->rfc) ? $item->rfc : STR_PAD_LEFT; 
                    
                }
                if ((in_array('personalInformation.curp', $allkeys))) {
                    $values['personalInformation.curp'] = isset($item->curp) ? $item->curp : STR_PAD_LEFT;
                }
                if ((in_array('personalInformation.nss', $allkeys))) {
                    $values['personalInformation.nss'] = isset($item->nss) ? $item->nss : STR_PAD_LEFT;
                }
                if ((in_array('personalInformation.cat_gender_id', $allkeys))) {
                    $values['personalInformation.cat_gender_id'] = isset($item->gender->name) ? $item->gender->name : STR_PAD_LEFT;
                }
                if ((in_array('personalInformation.cat_marital_status_id', $allkeys))) {
                    $values['personalInformation.cat_marital_status_id'] = isset($item->maritalStatus->name) ? $item->maritalStatus->name : STR_PAD_LEFT;
                }
                if ((in_array('personalInformation.cat_country_id', $allkeys))) {
                    $values['personalInformation.cat_country_id'] = isset($item->country->name) ? $item->country->name : STR_PAD_LEFT;
                }
                if ((in_array('personalInformation.cat_state_id', $allkeys))) {
                    $values['personalInformation.cat_state_id'] = isset($item->state->name) ? $item->state->name : STR_PAD_LEFT;
                }
                if ((in_array('personalInformation.birthdate', $allkeys))) {
                    $values['personalInformation.birthdate'] = isset($item->birthdate) ? $item->birthdate : STR_PAD_LEFT;
                }
                if ((in_array('personalInformation.cat_educational_level_id', $allkeys))) {
                    $values['personalInformation.cat_educational_level_id'] = isset($item->educationLevel->name) ? $item->educationLevel->name : STR_PAD_LEFT;
                }
                if ((in_array('personalInformation.email', $allkeys))) {
                    $values['personalInformation.email'] = isset($item->email) ? $item->email : STR_PAD_LEFT;
                }
                if ((in_array('personalInformation.telephone', $allkeys))) {
                    $values['personalInformation.telephone'] = isset($item->telephone) ? $item->telephone : STR_PAD_LEFT;
                }
                if ((in_array('personalInformation.cellphone', $allkeys))) {
                    $values['personalInformation.cellphone'] = isset($item->cellphone) ? $item->cellphone : STR_PAD_LEFT;
                }

                //personalEmergency
                if (in_array('personalEmergency.contact_name', $allkeys)) {
                     $values['personalEmergency.contact_name'] = isset($item->contact->name) ? $item->contact->name : STR_PAD_LEFT;
                }
                if (in_array('personalEmergency.contact_phone', $allkeys)){
                    $values['personalEmergency.contact_phone'] = isset($item->contact->phone) ? $item->contact->phone : STR_PAD_LEFT;
                } 

                


                //personalAdress

               

                if(isset($allkeys) && count($allkeys) > 0 && $this->checkExistsKey('personalAdress') && isset($item->addresses)){
                    $tmp = '';
                    foreach ($item->addresses as $address) {

                        if(in_array('personalAdress.state', $allkeys)){
                            $tmp .=  "Estado: {$address->state->name} " ;   
                        }
                        if(in_array('personalAdress.town', $allkeys)) {
                            $tmp .=  "Municipio: {$address->town} "; 
                        }
                        if(in_array('personalAdress.neighborhood', $allkeys)){
                            $tmp .= "Colonia: {$address->neighborhood} ";
                        }
                        if (in_array('personalAdress.city', $allkeys)) {
                            $tmp .= "Ciudad: {$address->city} ";
                        }
                        if (in_array('personalAdress.zipcode', $allkeys)) {
                            $tmp .= "CP: {$address->zipcode} "; 
                        }
                        if (in_array('personalAdress.street', $allkeys)) {
                            $tmp .= "Calle: {$address->street} "; 
                        }
                        if (in_array('personalAdress.ext_num', $allkeys)) {
                            $tmp .= "Número exterior: {$address->ext_num} "; 
                        }
                        if (in_array('personalAdress.int_num', $allkeys)) {
                           $tmp .= "Número interior: {$address->int_num} "; 
                        } 
                        if(trim($tmp) != ""){
                            $tmp .=  "\r\n";  
                        }
                    }

                    $values['personalAdress'] =  $tmp; 
                   
                }  

                
                 
               // personalExperience
               if(isset($allkeys) && count($allkeys) > 0 && $this->checkExistsKey('personalExperience') && isset($item->jobs)){
                    $tmp = '';
                    foreach ($item->jobs as $job) {
                        if (in_array('personalExperience.company', $allkeys)) {
                            $tmp .= "Empresa: {$job->company} ";  
                        }
                        if (in_array('personalExperience.position', $allkeys)) {
                            $tmp .= "Cargo: {$job->position} ";  
                        }
                        if (in_array('personalExperience.start_date', $allkeys)) {
                            $tmp .= "Fecha de inicio: {$job->start_date} " ;  
                        }
                        if (in_array('personalExperience.end_date', $allkeys)) {
                            $tmp .= "Fecha de finalización: {$job->end_date} " ;  
                        }
                        if (in_array('personalExperience.description', $allkeys)) {
                            $tmp .= "Descripción: {$job->description} ";  
                        }
                        if (in_array('personalExperience.achievements', $allkeys)) {
                            $tmp .= "Logros: {$job->achievements} "; 
                        }

                        if(trim($tmp) != ""){
                            $tmp .=  "\r\n";  
                        }
                    }
                   
                    $values['personalExperience'] =  $tmp; 

                    }

                //personalEducation
                if(isset($allkeys) && count($allkeys) > 0 && $this->checkExistsKey('personalEducation') && isset($item->education)){
                    $tmp = '';
                    foreach ($item->education as $educations) {
                        if (in_array('personalEducation.school', $allkeys)) {
                            $tmp .= "Escuela: {$educations->school} ";  
                        }
                        if (in_array('personalEducation.title', $allkeys)) {
                            $tmp .= "Titulación: {$educations->title} ";  
                        }
                        if (in_array('personalEducation.education_status', $allkeys)) {
                            $tmp .= "Situación actual: {$educations->status->name} ";  
                        }
                        if (in_array('personalEducation.start_date', $allkeys)) {
                            $tmp .= "Fecha de inicio: {$educations->start_date} ";  
                        }
                        if (in_array('personalEducation.end_date', $allkeys)) {
                            $tmp .= "Fecha de finalización: {$educations->end_date} ";  
                        }
                        if (in_array('personalEducation.description', $allkeys)) {
                            $tmp .= "Descripción: {$educations->description} "; 
                        }

                        if(trim($tmp) != ""){
                            $tmp .=  "\r\n";  
                        }
                    }
                    $values['personalEducation'] =  $tmp; 

                    }
                


                 //personalCertifications
                 if(isset($allkeys) && count($allkeys) > 0 && $this->checkExistsKey('personalCertifications') && isset($item->certifications)){
                    $tmp = '';
                    foreach ($item->certifications as $certification) {
                        if (in_array('personalCertifications.entify', $allkeys)) {
                            $tmp .= "Emisor: {$certification->school} ";  
                        }
                        if (in_array('personalCertifications.name', $allkeys)) {
                            $tmp .= "Nombre de la certificación: {$certification->name} ";  
                        }
                        if (in_array('personalCertifications.description', $allkeys)) {
                            $tmp .= "Descripción: {$certification->description} ";  
                        }
                        if (in_array('personalCertifications.start_date', $allkeys)) {
                            $tmp .= "Fecha de inicio: {$certification->start_date} ";  
                        }
                        if (in_array('personalCertifications.end_date', $allkeys)) {
                            $tmp .= "Fecha de finalización: {$certification->end_date} ";  
                        }
                        if (in_array('personalCertifications.credential_id', $allkeys)) {
                            $tmp .= "ID de la credencial: {$certification->credential_id} ";  
                        }
                        if (in_array('personalCertifications.url', $allkeys)) {
                            $tmp .= "URL: {$certification->url} ";  
                        }
                        if(trim($tmp) != ""){
                            $tmp .=  "\r\n";  
                        }
                    }
                   
                    $values['personalCertifications'] =  $tmp; 

                }
                //Skills
                 if (in_array('personalSkills.skills', $allkeys)){
                    $values['personalSkills.skills'] = $item->skills;
                } 

                //personalBank
                if(isset($allkeys) && count($allkeys) > 0 && $this->checkExistsKey('personalBank') && isset($item->accounts)){
                    $tmp = '';
                    foreach ($item->accounts as $account) {
                        if (in_array('personalBank.cat_bank_account_type', $allkeys)) {
                            $tmp .= " Tipo de cuenta: {$account->catBankType->name} ";  
                        }
                        if (in_array('personalBank.clabe', $allkeys)) {
                            $tmp .= "Clabe: {$account->clabe} "; 
                        }
                        if (in_array('personalBank.cat_bank_id', $allkeys)) {
                            $tmp .= "Banco: {$account->bank->name} "; 
                        }
                        if (in_array('personalBank.clabe', $allkeys) && $account->isActive === true) {
                            $tmp .= " Estatus: Activa ";    
                        }
                        if (in_array('personalBank.clabe', $allkeys) && $account->isActive === false) {
                            $tmp .= " Estatus: Inactiva ";
                        }
                        if(trim($tmp) != ""){
                            $tmp .=  "\r\n";  
                        }
                    }
                    $values['personalBank'] =  $tmp; 

                }

                //personalLabor
                if(isset($allkeys) && count($allkeys) > 0 && $this->checkExistsKey('personalLabor') && isset($item->employments)){
                    $tmp = '';
                    foreach ($item->employments as $employment) {
                        if (in_array('personalLabor.cat_employment_type_id', $allkeys)) {
                            $tmp .= "Tipo de movimiento: {$employment->employment_type->name} ";  
                        }
                        if (in_array('personalLabor.date', $allkeys)) {
                            $tmp .= "Fecha de aplicación del movimiento: {$employment->date} ";  
                        }
                        if (in_array('personalLabor.cat_contract_type_id', $allkeys)) {
                            $tmp .= "Tipo de contratación: {$employment->contracType->name} ";  
                        }
                        if (in_array('personalLabor.cat_unit_id', $allkeys)) {
                            $tmp .= "Unidad administrativa: {$employment->unit->name} ";  
                        }
                        if (in_array('personalLabor.position_id', $allkeys)) {
                            $tmp .= "Puesto: {$employment->position->name} ";  
                        }
                        if (in_array('personalLabor.cat_employment_location_id', $allkeys)) {
                            $tmp .= "Ubicación física: {$employment->location->name} "; 
                        }
                        if ((in_array('personalLabor.has_kit', $allkeys) && $employment->has_kit === true)) {
                            $tmp .=  " Kit: Sí ";
                        }
                        if ((in_array('personalLabor.has_kit', $allkeys) && $employment->has_kit === false)) {
                            $tmp .=  " Kit: No ";
                        }
                        if(trim($tmp) != ""){
                            $tmp .=  "\r\n";  
                        }
                    }
                    $values['personalLabor'] =  $tmp; 

                }
              
                if(isset($dynamicForm) && count($dynamicForm) > 0 && isset($item->customField)){
                     
                    foreach($dynamicForm as $dynamic){
                        $check = false;
                    foreach ($item->customField as $customField) {
                      
                        if ((int)$dynamic == $customField->cat_custom_field_id ){

                            $value = '';
                            if($customField->catCustomField->cat_type_data_id === 2 || $customField->catCustomField->cat_type_data_id === 3){// 2 lista 3 radio 
                                $value = CustomPivotOption::select('name')->find((int ) $customField->value)->name; 
                            }else if($customField->catCustomField->cat_type_data_id === 4 ){// 4 checkbox
                                $value = (boolean)$customField->value === true ? 'Sí' : 'No';
                            }else{
                                $value = $customField->value;
                            }
                            array_push($values, $value);
                            $check = true;  
                                     
                        }    
                    }
                    
                    if(!$check){
                        array_push($values, '');  
                    } 
                }
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

        $dynamicForm = isset($this->filters['dynamicForm']) ? $this->filters['dynamicForm'] : [] ;
        $catTypeEmployeeId = $this->filters['cat_type_employee_id'];
        $count = 0;
        $orderItems = $this->filters['allkeys'];
        
        

        
        $headings = [];

              
                 //personalInformation
                if (in_array('personalInformation.code', $allkeys)){

                    //array_push($headings, 'Code'); 
                    $headings['personalInformation.code'] = 'Code';
                    $count++;
                    array_push($this->numberColumn, $count);
                
                }

                    if (in_array('personalInformation.name', $allkeys)){
                    $headings['personalInformation.name'] = 'Nombre';
                     $count++;
                    }
                    if (in_array('personalInformation.lastname', $allkeys)){
                        $headings['personalInformation.lastname'] = 'Primer apellido'; 
                        $count++; 
                    }
                    if (in_array('personalInformation.second_lastname', $allkeys)) {
                        $headings['personalInformation.second_lastname'] = 'Segundo apellido';
                        $count++;
                    }
                    if (in_array('personalInformation.rfc', $allkeys)){
                        $headings['personalInformation.rfc'] = 'RFC' ;
                        $count++; 
                        array_push($this->numberColumn, $count);        
                    }
                    if (in_array('personalInformation.curp', $allkeys)){
                        $headings['personalInformation.curp'] = 'Curp' ;
                        $count++; 
                        array_push($this->numberColumn, $count);        
                    }
                    if (in_array('personalInformation.nss', $allkeys)){
                        $headings['personalInformation.nss'] = 'Nss' ;
                        $count++; 
                        array_push($this->numberColumn, $count);        
                    }
                    if (in_array('personalInformation.cat_gender_id', $allkeys)) {
                        $headings['personalInformation.cat_gender_id'] = 'Género';
                        $count++;
                    }
                    if (in_array('personalInformation.cat_marital_status_id', $allkeys)) {
                        $headings['personalInformation.cat_marital_status_id'] = 'Estado civil';
                        $count++;
                    }
                    if (in_array('personalInformation.cat_country_id', $allkeys)) {
                        $headings['personalInformation.cat_country_id'] = 'País de nacimiento';
                        $count++;
                    }
                    if (in_array('personalInformation.cat_state_id', $allkeys)) {
                        $headings['personalInformation.cat_state_id'] = 'Estado';
                        $count++;
                    }
                    if (in_array('personalInformation.birthdate', $allkeys)) {
                        $headings['personalInformation.birthdate'] = 'Fecha de nacimiento';
                        $count++;
                    }
                    if (in_array('personalInformation.cat_educational_level_id', $allkeys)) {
                        $headings['personalInformation.cat_educational_level_id'] = 'Nivel de estudios';
                        $count++;
                    }
                    if (in_array('personalInformation.email', $allkeys)) {
                        $headings['personalInformation.email'] = 'Correo electronico';
                        $count++;
                    }
                    if (in_array('personalInformation.telephone', $allkeys)){
                        $headings['personalInformation.telephone'] = 'Teléfono' ;
                        $count++; 
                        array_push($this->numberColumn, $count);        
                    }
                    if (in_array('personalInformation.cellphone', $allkeys)){
                        $headings['personalInformation.cellphone'] = 'Móvil' ;
                        $count++; 
                        array_push($this->numberColumn, $count);        
                    }
                    if (in_array('personalEmergency.contact_name', $allkeys)) {
                        $headings['personalEmergency.contact_name'] = 'Nombre contacto de emergencia';
                        $count++;
                    }
                    if (in_array('personalEmergency.contact_phone', $allkeys)){
                        $headings['personalEmergency.contact_phone'] = 'Número contacto de emergencia'; 
                        $count++;
                    }




                if (in_array('personalAdress.state', $allkeys) 
                || in_array('personalAdress.town', $allkeys) 
                || in_array('personalAdress.neighborhood', $allkeys) 
                || in_array('personalAdress.city', $allkeys)                    
                || in_array('personalAdress.zipcode', $allkeys) 
                || in_array('personalAdress.street', $allkeys) 
                || in_array('personalAdress.ext_num', $allkeys)
                || in_array('personalAdress.int_num', $allkeys)){     
                    $headings['personalAdress'] = 'Direcciones'; 
                    $count++;    
                }





                 if (in_array('personalExperience.company', $allkeys) 
                || in_array('personalExperience.position', $allkeys) 
                || in_array('personalExperience.start_date', $allkeys) 
                || in_array('personalExperience.end_date', $allkeys) 
                || in_array('personalExperience.description', $allkeys) 
                || in_array('personalExperience.achievements', $allkeys)){      
                    $headings['personalExperience'] = 'Datos profesionales Experiencia'; 
                    $count++;
                } 

                
                 //personalEducation
               if (in_array('personalEducation.school', $allkeys) 
                || in_array('personalEducation.title', $allkeys) 
                || in_array('personalEducation.education_status', $allkeys) 
                || in_array('personalEducation.start_date', $allkeys) 
                || in_array('personalEducation.end_date', $allkeys) 
                || in_array('personalEducation.description', $allkeys)){                    
                    $headings['personalEducation'] = 'Datos profesionales Educación'; 
                    $count++;  
                } 




                //personalCertifications
                if (in_array('personalCertifications.entify', $allkeys) 
                || in_array('personalCertifications.name', $allkeys) 
                || in_array('personalCertifications.description', $allkeys) 
                || in_array('personalCertifications.start_date', $allkeys) 
                || in_array('personalCertifications.end_date', $allkeys) 
                || in_array('personalCertifications.credential_id', $allkeys) 
                || in_array('personalCertifications.url', $allkeys)){ 
                    $headings['personalCertifications'] = 'Datos profesionales Certificaciones'; 
                    $count++;} 
                //Skills
                if (in_array('personalSkills.skills', $allkeys)){
                    $headings['personalSkills.skills'] = 'Habilidades'; 
                    $count++;
                }
                //personalBank
                if (in_array('personalBank.cat_bank_account_type', $allkeys)
                || in_array('personalBank.clabe', $allkeys)
                || in_array('personalBank.cat_bank_id', $allkeys)){
                    $headings['personalBank'] = 'Datos bancarios'; 
                    $count++;} 
                //personalLabor
                if (in_array('personalLabor.cat_employment_type_id', $allkeys)
                || in_array('personalLabor.date', $allkeys)
                || in_array('personalLabor.cat_contract_type_id', $allkeys)
                || in_array('personalLabor.cat_unit_id', $allkeys)
                || in_array('personalLabor.position_id', $allkeys)
                || in_array('personalLabor.has_kit', $allkeys)
                || in_array('personalLabor.cat_employment_location_id', $allkeys)){
                    $headings['personalLabor'] = 'Datos laborales'; 
                    $count++;} 
                //dynamicForms
               // if (in_array(1, $dynamicForm)) array_push($headings, 'Valor');   { $count++;}
              

               if(isset($dynamicForm) && count($dynamicForm) > 0 && isset($this->catCustomField)){
               
                foreach($dynamicForm as $dynamic){
                foreach ($this->catCustomField as $item) {
                    if ((int)$dynamic == $item->id ){
                        array_push($headings, $item->name);
                        $count++;
                    }    
                }
            }
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
            //dd($this->lastColumn);
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
                        // return [

                        // 'A' => '0000', //ID UNICO TRANSACCION
                        // 'B' => NumberFormat::FORMAT_NUMBER, //ID  CONSECUTIVO
                        // // 'J' => NumberFormat::FORMAT_NUMBER, //FECHA_NACIMIENTO
                        // // 'G' => 'yyyy-mm-dd', //FECHA_NACIMIENTO
                        // // 'P' => 'yyyy-mm-dd', //FECHA_APERTURA
                        // // 'Q' => 'yyyy-mm-dd', //FECHA_DISPERSION
                        // // 'R' => NumberFormat::FORMAT_NUMBER, //NUMERO_CUENTA
                        // // 'U' => '00000000', //MONTO_DISPERSAR_USD
                        // // 'V' => '00000000', //RETENCION USD
                        // ];
                    }
}