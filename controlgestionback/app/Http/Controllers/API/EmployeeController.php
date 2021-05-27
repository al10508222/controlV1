<?php
namespace App\Http\Controllers\API;

use App\Models\AuditLog;
use App\Models\Catalogs\CatModule;
use App\Models\CatAuditMovementType;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Employment;
use App\Traits\Auditable;
use Illuminate\Http\Request;
use App\Exports\PayrollReport;
use App\Exports\EmployeeReport;
use App\Exports\PositionReport;
use App\Models\EmployeeAddress;
use App\Models\EmployeeContact;
use App\Models\EmployeeDocument;
use App\Exports\EmployeeReportPdf;
use Illuminate\Support\Facades\DB;
use App\Models\EmployeeBankAccount;
use App\Http\Controllers\Controller;
use App\Models\Catalogs\CatDocument;
use Illuminate\Validation\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\EmployeeCertification;
use App\Imports\PayrollEmployeeImport;
use App\Models\EmployeeHasCustomField;
use App\Models\EmployeeWorkExperience;
use App\Models\Catalogs\CatCustomField;
use App\Http\Requests\StoreEmployeePost;
use Illuminate\Database\Eloquent\Builder;
use App\Models\EmployeeEducationExperience;
use App\Http\Controllers\API\partials\TEmployeeReport;
use Maatwebsite\Excel\Exceptions\NoTypeDetectedException;

class EmployeeController extends Controller
{
    use Auditable;
    use TEmployeeReport;
    private $EMPLOYEE_REGISTER_STATUS = 2;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $rowsPerPage = $request->input('rowsPerPage');
            $search = $request->input('needle');
            $employees = Employee::search($search)->where('type_employee', Employee::EMPLOYEE)->orderBy('created_at','desc')->paginate($rowsPerPage);

            return response()->json([
                'success' => true,
                'employees' => $employees,
			]);
        }catch (\Exception $e) {
            error_log($e->getMessage());
			return response()->json([
				'success' => false,
				'message' => 'Error'
			]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeePost $request)
    {
        error_log("store@EmployeeController");
        try {
            $validated = $request->validated();

            if (!$validated) {
                // ??? why validator does not exists
				$messages = $validator->messages();
				return response()->json([
					'message' => $messages
				], 400);
            }

            DB::beginTransaction();

            // Store employee with data
            $employee = new Employee();
            $data = $request->all();
            $employee->fill($data);
            $employee->cat_employee_status_id = $this->EMPLOYEE_REGISTER_STATUS;
            $employee->save();

            // Storing addresses
            foreach ($request['addresses'] as $addressJson) {
                $address = new EmployeeAddress();
                $address->fill($addressJson);
                $address->employee_id = $employee->id;
                $address->cat_state_id = $addressJson['state']['id'];
                $address->save();
            }

            // Storing work experience
            foreach ($request['jobs'] as $jobJson) {
                $work = new EmployeeWorkExperience();
                $work->fill($jobJson);
                $work->employee_id = $employee->id;
                $work->save();
            }

            // Storing education experience
            foreach ($request['education'] as $educationJson) {
                $education = new EmployeeEducationExperience();
                $education->fill($educationJson);
                $education->cat_education_status_id = isset($educationJson['status']) ?  $educationJson['status']['id'] : '';
                $education->employee_id = $employee->id;
                $education->save();
            }

            // Storing Certifications
            foreach ($request['certifications'] as $certificationJson) {
                $certification = new EmployeeCertification();
                $certification->fill($certificationJson);
                $certification->employee_id = $employee->id;
                $certification->save();
            }

            // Storing documents...
            foreach($request['documents'] as $document) {
                if(isset($document['file']['id'])){
                    $employeeDocument = new EmployeeDocument();
                    $employeeDocument->employee_id = $employee->id;
                    $employeeDocument->cat_document_id = $document['id'];
                    $employeeDocument->file_id = $document['file']['id'];
                    $employeeDocument->expiry_date = isset($document['expiry_date']) ? $document['expiry_date'] : null;
                    $employeeDocument->save();
                }
            }

            // Storing employments
            foreach ($request['employments'] as $key => $employmentJson) {
                $employment = new Employment();
                $employment->employee_id = $employee->id;
                $employment->cat_employment_type_id = isset($employmentJson['employment_type']) ?  $employmentJson['employment_type']['id'] : '';
                $employment->cat_contract_type_id = isset($employmentJson['contract_type']) ?  $employmentJson['contract_type']['id'] : '';
                $employment->cat_unit_id = isset($employmentJson['unit']) ?  $employmentJson['unit']['id'] : '';
                $employment->cat_employment_location_id = isset($employmentJson['location']) ?  $employmentJson['location']['id'] : '';
                $employment->cat_employment_client_id = isset($employmentJson['client']) ?  $employmentJson['client']['id'] : null;
                $employment->position_id = $employmentJson['position']['id'];
                $employment->has_kit = $employmentJson['has_kit'];
                $employment->date = $employmentJson['date'];
                $employment->is_active = $key === array_key_last($request['employments']);
                $employment->save();

                // Get position and mark it as not available
                $position = Position::where('id', $employment->position_id)->first();
                $position->is_available = false;
                $position->save();
            }

            // Storing bank accounts
            foreach ($request['accounts'] as $bankJson) {
                $bank = new EmployeeBankAccount();
                $bank->fill($bankJson);
                $bank->employee_id = $employee->id;
                $bank->save();
            }

            // Storing contact
            if (isset($data["contact"]) && isset($data["contact"]["name"])) {
                // Store contact
                $contact = new EmployeeContact();
                $contact->fill($data['contact']);
                $contact->employee_id = $employee->id;
                $contact->save();
            }

            // Storing Custom Field Values
            if (isset($data['customValues']))
            foreach ($data['customValues'] as $customValue) {
                if (!isset($customValue['value'])) continue;

                $ehcf = new EmployeeHasCustomField;
                $ehcf->employee_id = $employee->id;
                $ehcf->cat_custom_field_id = $customValue['id'];
                $ehcf->value = is_array($value = $customValue['value']) ? json_encode($value) : $value;
                $ehcf->value = isset($customValue['calculator_field']) ? 0.0: (float)$ehcf->value; // TODO: wtf
                $ehcf->save();
            }

            $this->audit(CatModule::EMPLOYEES, CatAuditMovementType::CREATE, $employee);
            DB::commit();

            return response()->json([
				'success' => true,
				'message' => '',
			], 200);

        } catch (\Exception $e) {
            error_log($e);
            DB::rollback();
			return response()->json([
				'success' => false,
				'message' => 'Error'
			]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $employee = Employee::with(
                'gender',
                'maritalStatus',
                'country',
                'state',
                'educationLevel',
                'addresses.state',
                'jobs',
                'education.status',
                'certifications',
                'accounts',
                'contact',
                'employments.employment_type',
                'employments.offWorkReason',
                'employments.unit',
                'employments.contract_type',
                'employments.location',
                'employments.client',
                'employments.position',
                )
                ->where('id', $id)
                ->without('documents')
                ->first();

            $values = CatCustomField::customValues($employee->id)->get();
            $employee['customValues'] = $values;

            $documents = CatDocument::employeeFiles($employee->id)
                ->where('cat_module_id', 10)
                ->orderBy('name','asc')
                ->get();
            $employee['documents'] = $documents;

            return response()->json([
                'success' => true,
                'employee' => $employee
            ]);
        }catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Ha ocurrido un error'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $employee = Employee::find($id);
            $data = $request->all();
            $employee->fill($data);
            $employee->save();

             // Updating addresses
             foreach ($request['addresses'] as $addressJson) {
                $address = isset($addressJson['id']) ? EmployeeAddress::find($addressJson['id']) : new EmployeeAddress();
                $address->fill($addressJson);
                $address->employee_id = $employee->id;
                $address->cat_state_id = $addressJson['state']['id'];
                $address->save();
            }

             // Updating work experience
             foreach ($request['jobs'] as $jobJson) {
                $work = isset($jobJson['id']) ? EmployeeWorkExperience::find($jobJson['id']) : new EmployeeWorkExperience();
                $work->fill($jobJson);
                $work->employee_id = $employee->id;
                $work->save();
            }

            // Updating education experience
            foreach ($request['education'] as $educationJson) {
                $education = isset($educationJson['id']) ? EmployeeEducationExperience::find($educationJson['id']) : new EmployeeEducationExperience();
                $education->fill($educationJson);
                $education->employee_id = $employee->id;
                $education->cat_education_status_id = isset($educationJson['status']) ?  $educationJson['status']['id'] : '';
                $education->save();
            }

            // Storing certification experience
            foreach ($request['certifications'] as $certificationJson) {
                $certification = isset($certificationJson['id']) ? EmployeeCertification::find($certificationJson['id']) : new EmployeeCertification();
                $certification->fill($certificationJson);
                $certification->employee_id = $employee->id;
                $certification->save();
            }

            foreach($request['documents'] as $document) {
                if(isset($document['file']['id'])){
                    //$employeeDocument = isset($document['id'])  ? EmployeeDocument::find($document['id']) : new EmployeeDocument();
                    $employeeDocument = EmployeeDocument::find($document['file']['id']) ?? new EmployeeDocument();
                    \Safe\error_log("id: $employeeDocument->id : ".$document['id']);
                    $employeeDocument->employee_id = $employee->id;
                    $employeeDocument->cat_document_id = $document['id'];
                    $employeeDocument->file_id = $document['file']['id'];
                    $employeeDocument->expiry_date = isset($document['expiry_date']) ? $document['expiry_date'] : null;
                    $employeeDocument->save();
                }
            }

            // Update employments
            foreach ($request['employments'] as $key => $employmentJson) {
                $employment = isset($employmentJson['id']) ? Employment::find($employmentJson['id']) : new Employment();
                $employment->employee_id = $employee->id;
                $employment->cat_employment_type_id = isset($employmentJson['employment_type']) ?  $employmentJson['employment_type']['id'] : '';
                $employment->cat_contract_type_id = isset($employmentJson['contract_type']) ?  $employmentJson['contract_type']['id'] : '';
                $employment->cat_unit_id = isset($employmentJson['unit']) ?  $employmentJson['unit']['id'] : '';
                $employment->cat_employment_location_id = isset($employmentJson['location']) ?  $employmentJson['location']['id'] : '';
                $employment->cat_employment_client_id = isset($employmentJson['client']) ?  $employmentJson['client']['id'] : null;
                $employment->position_id = $employmentJson['position']['id'];
                $employee->has_kit = $employmentJson['has_kit'];
                $employment->is_active = $key === array_key_last($request['employments']);
                $employment->date = $employmentJson['date'];
                $employment->save();

                // Get position and mark it as not available
                $position = Position::where('id', $employment->position_id)->first();
                $position->is_available = false;
                $position->save();
            }


            foreach ($request['accounts'] as $bankJson) {
                $bank = isset($bankJson['id']) ? EmployeeBankAccount::find($bankJson['id']) : new EmployeeBankAccount();
                $bank->fill($bankJson);
                $bank->employee_id = $employee->id;
                $bank->save();
            }

            // Update emergency contact
            if (isset($data["contact"]) && isset($data["contact"]["name"])) {
                // Store contact
                $contact = EmployeeContact::where('employee_id', $employee->id)->first();
                $contact = isset($contact) ? $contact : new EmployeeContact();
                $contact->fill($data['contact']);
                $contact->employee_id = $employee->id;
                $contact->save();
            }

            // Updating Custom Field Values
            if (isset($data['customValues']))
                foreach ($data['customValues'] as $customValue) {
                    if ($customValue['values']) {
                        $ehcf = EmployeeHasCustomField::find($customValue['values'][0]['id']);
                    } else {
                        $ehcf = new EmployeeHasCustomField;
                    }
                    $value = $customValue['value'] ?: '';
                    $value = !$customValue['calculator_field'] ? $value : (float)$value;
                    if(!$ehcf && !$value) continue;

                    $ehcf->employee_id = $employee->id;
                    $ehcf->cat_custom_field_id = $customValue['id'];
                    $ehcf->value = is_array($value) ? json_encode($value) : $value;
                    $ehcf->save();
                }

            $this->audit(CatModule::EMPLOYEES, CatAuditMovementType::UPDATE, $employee);
            DB::commit();

            return response()->json([
				'success' => true,
				'message' => '',
			], 200);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
				'success' => false,
				'message' => $e->getMessage()
			]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $employee = Employee::where( 'id', $id)
                ->without(['account', 'user', 'documents'])
                ->with('current_employment')
                ->first();

            $employee->delete();
            if (count($employee->current_employment) && $employee->current_employment[0]) {
                $employment = $employee->current_employment[0];
                $employment->is_active = false;
                $employment->save();
                $employment->delete();
            }

            $this->audit(CatModule::EMPLOYEES, CatAuditMovementType::DELETE, $employee);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            error_log($e->getMessage());
            return response('',500);
        }
    }

    public function destroyEntry(Request $request, $id)
    {
        try {
            switch ($request->input('type')) {
                case 'experience':
                    $res = EmployeeWorkExperience::where( 'id', $id)->delete();
                    break;
                case 'education':
                    $res = EmployeeEducationExperience::where( 'id', $id)->delete();
                break;
                case 'certification':
                    $res = EmployeeCertification::where( 'id', $id)->delete();
                    break;
                default:
                    throw new \Exception('Not defined option ');
                    break;
            }

            return response()->json([
				'success' => $res,
				'message' => '',
            ], 200);

        } catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json([
				'success' => false,
				'message' => 'Ha ocurrido un error'
			]);
        }
    }

    public function getAllByContractType($id) {
        try {
            $employees = Employee::whereHas('employments', function (Builder $query) use ($id) {
                $query->where([
                    ['is_active', '=', true],
                    ['cat_contract_type_id', '=', $id]
                ]);
            })->get();

            return response()->json([
                'success' => true,
                'employees' => $employees
            ]);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json([
				'success' => false,
				'message' => 'Error'
			]);
        }

    }

    public function employeeReport(Request $request){
       if ($request->input('mainForm.cat_module_id')== 1) {
        if ($request->input('documentType')== 'excel'){
            return Excel::download(new EmployeeReport($request->all()), 'Reporte-Empleados.xlsx');
        }
        elseif($request->input('documentType')== 'pdf'){
            return Excel::download(new EmployeeReport($request->all()), 'Reporte-Empleados.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        }
        else {
            return Excel::download(new EmployeeReport($request->all()), 'Reporte-Empleados.csv', \Maatwebsite\Excel\Excel::CSV,[
                'Content-type => text/csv',
            ]);
        }       
    }elseif($request->input('mainForm.cat_module_id')== 18){
        if ($request->input('documentType')== 'excel'){
            return Excel::download(new PositionReport($request->all()), 'Reporte-Empleados.xlsx');
        }
        elseif($request->input('documentType')== 'pdf'){
            return Excel::download(new PositionReport($request->all()), 'Reporte-Empleados.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        }
        else {
            return Excel::download(new PositionReport($request->all()), 'Reporte-Empleados.csv', \Maatwebsite\Excel\Excel::CSV,[
                'Content-type => text/csv',
            ]);
        }  
    }elseif($request->input('mainForm.cat_module_id')== 11){
        if ($request->input('documentType')== 'excel'){
            return Excel::download(new PayrollReport($request->all()), 'Reporte-Empleados.xlsx');
        }
        elseif($request->input('documentType')== 'pdf'){
            return Excel::download(new PayrollReport($request->all()), 'Reporte-Empleados.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        }
        else {
            return Excel::download(new PayrollReport($request->all()), 'Reporte-Empleados.csv', \Maatwebsite\Excel\Excel::CSV,[
                'Content-type => text/csv',
            ]);
        }  
    }
    }

    public function searchByCURP(Request $request) {
        try {
            $employee = Employee::with(
                'employment.position', 
                'employment.contract_type', 
                'employment.unit',
                'employment.offWorkReason')
                ->where('type_employee', Employee::EMPLOYEE)
                ->where('curp', $request->input('curp'))
                ->first();

            return response()->json([
                'success' => true,
                'employee' => $employee,
			]);
        } catch (\Exception $e) {
            return response()->json([
				'success' => false,
				'message' => 'Error'
			]);
        }
    }

    public function massiveLoad(Request $request)
    {
        try {
            $importer = new PayrollEmployeeImport;
            $array = Excel::toArray($importer, $request->document);
            DB::beginTransaction();
            $response = $importer->import($array[0]);
            DB::commit();

            return response()->json($response);
        } catch (NoTypeDetectedException $e) {
            DB::rollBack();
            return response()->json([
                'message' => "El archivo cargado no corresponde con la plantilla de ejemplo.",
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception | \Error $e) {
            DB::rollBack();
            \Safe\error_log($e);
            return response()->json([
                'message' => "Error inesperado",
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function auditElement(Request $request, $id = null)
    {
        $rowsPerPage = $request->input('rowsPerPage');

        $logs = AuditLog::where('module.id', CatModule::EMPLOYEES);
        if($id) $logs = $logs->where('object.id', (int)$id);
        $logs = $logs->paginate((int)$rowsPerPage);

        return response()->json($logs);
    }
}
