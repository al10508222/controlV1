<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Employee;
use App\Models\UserExternal;
class ProviderExport implements FromCollection, WithHeadings, WithTitle, WithHeadingRow
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
        $employees = Employee::with('country','state','gender','maritalStatus','educationLevel')->where('type_employee', Employee::PROVIDER)->orderBy('created_at','desc')->get();
        $collection = collect();
        
        $row = 1;
        foreach ($employees as $employee) {
             $data = collect();
            if($this->request['name']){
                $data->push(
                    $employee->name,
                );
            }
            if($this->request['lastname']){
                $data->push(
                    $employee->lastname,
                );
            }
            if($this->request['second_lastname']){
                $data->push(
                    $employee->second_lastname,
                );
            }
            if($this->request['rfc']){
                $data->push(
                    $employee->rfc,
                );
            }
            if($this->request['curp']){
                $data->push(
                    $employee->curp,
                );
            }
            if($this->request['birthdate']){
                $data->push(
                    $employee->birthdate,
                );
            }
            if($this->request['telephone']){
                $data->push(
                    $employee->telephone,
                );
            }
            if($this->request['email']){
                $data->push(
                    $employee->email,
                );
            }
            if($this->request['cellphone']){
                $data->push(
                    $employee->cellphone,
                );
            }
            if($this->request['emergency_telephone']){
                $data->push(
                    $employee->emergency_telephone,
                );  
            }
            if($this->request['nss']){
                $data->push(
                    $employee->nss,
                );   
            }
            if($this->request['active']){
                $data->push(
                    $employee->is_first_time,
                );    
            }
            if($this->request['cat_gender_id']){
                $data->push(
                    isset($employee->gender) ? $employee->gender->name : ' ' ,
                );       
            }
            if($this->request['cat_marital_status_id']){
                $data->push(
                    isset($employee->maritalStatus) ? $employee->maritalStatus->name : ' ' ,
                );       
            }
            if($this->request['cat_country_id']){
                $data->push(
                    isset($employee->country) ? $employee->country->name : ' ' ,
                );   
            }
            if($this->request['cat_state_id']){
                $data->push(
                    isset($employee->state) ? $employee->state->name : ' ' ,
                );   
            }
            if($this->request['cat_educational_level_id']){
                $data->push(
                    isset($employee->educationLevel) ? $employee->educationLevel->name : ' ' ,
                );   
            }
            if($this->request['semblance']){
                $data->push(
                    $employee->semblance,
                );  
            }          
            $row++;
            $collection->push($data);
        }
        $this->lastRow = $row;
        return $collection;
    }

    public function title(): string {
        return 'Proveedores';
    }

    public function headings(): array {
        
        $results = array_filter($this->request);

        $headings = $results;

        if(isset($headings['name'])){
            $headings['name']  = 'Nombre';
        }
        if(isset($headings['lastname'])){
            $headings['lastname'] = 'Primer apellido';
        }
        if(isset($headings['second_lastname'])){
            $headings['second_lastname']  = 'Segundo apellido';
        }
        if(isset($headings['rfc'])){
            $headings['rfc']  = 'RFC';
        }
        if(isset($headings['curp'])){
            $headings['curp']  = 'CURP';
        }
        if(isset($headings['birthdate'])){
            $headings['birthdate']  = 'Fecha de nacimiento';
        }
        if(isset($headings['email'])){
            $headings['email']  = 'Correo electrónico';
        }
        if(isset($headings['telephone'])){
            $headings['telephone']  = 'Teléfono';
        }
        if(isset($headings['cellphone'])){
            $headings['cellphone']  = 'Teléfono célular';
        }
        if(isset($headings['emergency_telephone'])){
            $headings['emergency_telephone']  = 'Teléfono emergencía';
        }
        if(isset($headings['nss'])){
            $headings['nss']  = 'NSS';
        }
        if(isset($headings['active'])){
            $headings['active']  = 'Estatus de cuenta';
        }
        if(isset($headings['cat_gender_id'])){
            $headings['cat_gender_id']  = 'Género';
        }
        if(isset($headings['cat_marital_status_id'])){
            $headings['cat_marital_status_id']  = 'Estado cívil';
        }
        if(isset($headings['cat_country_id'])){
            $headings['cat_country_id']  = 'País de nacimiento';
        }
        if(isset($headings['cat_state_id'])){
            $headings['cat_state_id']  = 'Estado de nacimiento';
        }
        if(isset($headings['cat_educational_level_id'])){
            $headings['cat_educational_level_id']  = 'Nivel de estudios';
        }
        if(isset($headings['semblance'])){
            $headings['semblance']  = 'Semblanza';
        }
        $headings = array_filter($headings);

        return [$headings];
    }
}
