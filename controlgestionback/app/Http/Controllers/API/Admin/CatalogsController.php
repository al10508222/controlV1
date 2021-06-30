<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalogs\CatConceptIsssteDeduction;
use App\Models\Catalogs\CatVacationsType;
use App\Models\LawVacations;
use Illuminate\Http\Request;
use App\Models\UserProfile;
use App\Models\Catalogs\CatContractType;
use App\Models\Catalogs\CatGender;
use App\Models\Catalogs\CatCountry;
use App\Models\Catalogs\CatState;
use App\Models\Catalogs\CatMaritalStatus;
use App\Models\Catalogs\CatEducationalLevel;
use App\Models\Catalogs\CatDocument;
use App\Models\Catalogs\CatBank;
use App\Models\Catalogs\CatSatConcept;
use App\Models\Catalogs\CatMonth;
use App\Models\Catalogs\CatBankAccount;
use App\Models\Catalogs\CatEducationStatus;
use App\Models\Catalogs\CatBankAccountType;
use App\Models\Catalogs\CatConceptImssDeduction;
use App\Traits\GeneralResponse;
use App\Traits\ProfileVerify;
use App\Models\Catalogs\CatDependency;
use App\Models\Catalogs\CatRulesImssDeduction;
use App\Models\Catalogs\CatUnit;
use App\Models\Catalogs\CatTabulator;
use App\Models\Catalogs\CatPeriodicityType;
use App\Models\Catalogs\CatEmploymentType;
use App\Models\Catalogs\CatEmployeeIncidentType;
use App\Models\Catalogs\CatEmploymentClient;
use App\Models\Catalogs\CatEmploymentLocation;
use App\Models\Catalogs\CatConceptType;
use App\Models\Catalogs\CatConceptCalculationType;
use App\Models\Catalogs\CatEmployeeIncidentInabilityType;
use App\Models\Catalogs\CatSatGroupingKey;
use App\Models\Catalogs\Core\CatCoreExpression;
use App\Models\Catalogs\Core\CatCoreExpressionType;
use App\Models\Catalogs\CatYearlyVariableType;
use App\Models\Catalogs\CatTypeData;
use App\Models\Catalogs\CatModule;
use App\Models\Catalogs\CatCustomField;
use App\Models\Catalogs\CatOffWorkReason;
use App\Models\Client;
use App\Models\CatTimeZone;
use App\Models\CatDay;
use App\Models\Project;
use App\Models\Employee;
use App\Models\HiringMemo;
use App\Models\Catalogs\CatPaymentStatuses;
use App\Models\Catalogs\CatSpecificBudgetItem;
use App\Models\entidades;
use App\Models\municipios;
use App\Models\localidades;
use App\Models\Acreditacion;
use App\Models\Estrato;
use App\Models\Asentamientos;
use App\Models\CucopModel;
use App\Models\VialidadesModel;
use App\Models\establecimientos;
use App\Models\operacion;
use App\Models\nivel_atencion;
use App\Models\tipologia;


class CatalogsController extends Controller
{
    use GeneralResponse, ProfileVerify;
    public function index(Request $request) {
        

        try {
            $catalogs = [];

            if($request->has('profiles') && $request->input('profiles') == true){
                $catalogs['profiles'] = UserProfile::select(['id','name'])->orderBy('name','asc')->get();
            }
            if($request->has('contracts') && $request->input('contracts') == true){
                $catalogs['contracts'] = CatContractType::select(['id','name'])->orderBy('name','asc')->get();
            }
            if($request->has('genders') && $request->input('genders') == true) {
                $catalogs['genders'] = CatGender::select(['id', 'name'])->orderBy('name', 'asc')->get();
            }
            if($request->has('countries') && $request->input('countries') == true) {
                $catalogs['countries'] = CatCountry::select(['id', 'name'])->orderBy('name', 'asc')->get();
            }
            if($request->has('states') && $request->input('states') == true) {
                $catalogs['states'] = CatState::select(['id', 'name'])->orderBy('name', 'asc')->get();
            }
            if($request->has('marital_statuses') && $request->input('marital_statuses') == true) {
                $catalogs['marital_statuses'] = CatMaritalStatus::select(['id', 'name'])->orderBy('name', 'asc')->get();
            }
            if($request->has('education_levels') && $request->input('education_levels') == true) {
                $catalogs['education_levels'] = CatEducationalLevel::select(['id', 'name'])->orderBy('name', 'asc')->get();
            }
            if($request->has('education_statuses') && $request->input('education_statuses') == true) {
                $catalogs['education_statuses'] = CatEducationStatus::select(['id', 'name'])->orderBy('name', 'asc')->get();
            }
            if($request->has('bank_account_types') && $request->input('bank_account_types') == true) {
                $catalogs['bank_account_types'] = CatBankAccountType::select(['id', 'name'])->orderBy('name', 'asc')->get();
            }
            if($request->has('documents') && $request->input('documents') == true) {
                $catalogs['documents'] = CatDocument::select('id','name','observations','is_required','is_visible','cat_module_id')->orderBy('name','asc')->get();
            }
            if($request->has('documents_employee') && $request->input('documents_employee') == true) {
                $catalogs['documents_employee'] = CatDocument::select('id','name','observations','is_required','is_visible','cat_module_id')
                    ->where('cat_module_id', 10)->orderBy('name','asc')
                    ->get();
            }
            if($request->has('documents_contract') && $request->input('documents_contract') == true) {
                $catalogs['documents_contract'] = CatDocument::select('id','name','observations','is_required','is_visible','cat_module_id')->where('cat_module_id',4)->orderBy('name','asc')->get();
            }
            if($request->has('documents_hiring_memo') && $request->input('documents_hiring_memo') == true) {
              $catalogs['documents_hiring_memo'] = CatDocument::select('id','name','observations','is_required','is_visible','cat_module_id')->where('cat_module_id',5)->orderBy('name','asc')->get();
            }
            if($request->has('hiring_memo') && $request->input('hiring_memo') == true) {
                $catalogs['hiring_memo'] = HiringMemo::select('id','name','project_id')->orderBy('name','asc')->get();
              }
            if($request->has('banks') && $request->input('banks') == true) {
                $catalogs['banks'] = CatBank::select(['id', 'name', 'identifier'])->orderBy('name', 'asc')->get();
            }
            if($request->has('dependencies') && $request->input('dependencies') == true) {
                $catalogs['dependencies'] = CatDependency::select(['id', 'name'])->orderBy('name', 'asc')->get();
            }
            if($request->has('cat_periodicity') && $request->input('cat_periodicity') == true) {
                $catalogs['cat_periodicity'] = CatPeriodicityType::select(['id', 'name'])->get();
            }
            if($request->has('concept_imss_deduction') && $request->input('concept_imss_deduction') == true) {
                $catalogs['concept_imss_deduction'] = CatConceptImssDeduction::select(['id', 'description'])->get();
            }
            if($request->has('rules_imss_deduction') && $request->input('rules_imss_deduction') == true) {
                $catalogs['rules_imss_deduction'] = CatRulesImssDeduction::select(['id', 'description', 'operation'])->get();
            }
            if($request->has('concept_issste_deduction') && $request->input('concept_issste_deduction') == true) {
                $catalogs['concept_issste_deduction'] = CatConceptIsssteDeduction::select(['id', 'description'])->get();
            }
            if($request->has('cat_modules') && $request->input('cat_modules') == true) {
                $catalogs['cat_modules'] = CatModule::select(['id', 'name'])->get();
            }
            if ($request->has('time_zones') && $request->input('time_zones') == true) {
                $catalogs['time_zones'] = CatTimeZone::select(['id', 'name'])->get();
            }
            if ($request->has('cat_days') && $request->input('cat_days') == true) {
                $catalogs['cat_days'] = CatDay::select(['id', 'name'])->get();
            }
            if($request->has('units') && $request->input('units') == true) {
                $catalogs['units'] = CatUnit::select(['id', 'name'])->get();
            }
            if($request->has('employment_types') && $request->input('employment_types') == true) {
                $catalogs['employment_types'] = CatEmploymentType::select(['id', 'name'])->get();
            }
            if($request->has('inability_types') && $request->input('inability_types') == true) {
                $catalogs['inability_types'] = CatEmployeeIncidentInabilityType::select(['id', 'name'])->get();
            }
            if($request->has('tabulators') && $request->input('tabulators') == true) {
                $catalogs['tabulators'] = CatTabulator::select(['id', 'name', 'cat_contract_type_id'])->get();
            }
            if($request->has('employment_locations') && $request->input('employment_locations') == true) {
                $catalogs['employment_locations'] = CatEmploymentLocation::select(['id', 'name'])->get();
            }
            if($request->has('employment_clients') && $request->input('employment_clients') == true) {
                $catalogs['employment_clients'] = CatEmploymentClient::select(['id', 'name'])->get();
            }
            if($request->has('employee') && $request->input('employee') == true) {
                $catalogs['employee'] = Employee::select(['id', 'rfc'])->get();
            }
            if($request->has('concept_types') && $request->input('concept_types') == true) {
                $catalogs['concept_types'] = CatConceptType::select(['id', 'name'])->get();
            }
            if($request->has('sat_grouping_keys') && $request->input('sat_grouping_keys') == true) {
                $catalogs['sat_grouping_keys'] = CatSatGroupingKey::select(['id', 'name', 'identifier'])->get();
            }
            if($request->has('cat_specific_budget_items') && $request->input('cat_specific_budget_items') == true) {
                $catalogs['cat_specific_budget_items'] = CatSpecificBudgetItem::select(['id', 'code', 'description'])
                    ->whereIn('chapter', [1, 3])->get();
            }
            if($request->has('concept_calculation_types') && $request->input('concept_calculation_types') == true) {
                $catalogs['concept_calculation_types'] = CatConceptCalculationType::select(['id', 'name'])->get();
            }
            if($request->has('core_expressions') && $request->input('core_expressions') == true) {
                $catalogs['core_expressions'] = CatCoreExpression::select(['id', 'name','description'])->get();
            }
            if($request->has('core_expression_types') && $request->input('core_expression_types') == true) {
                $catalogs['core_expression_types'] = CatCoreExpressionType::with(['expressions'])->get();
            }
            if($request->has('cat_yearly_variable_type') && $request->input('cat_yearly_variable_type') == true) {
                $catalogs['cat_yearly_variable_type'] = CatYearlyVariableType::select(['id', 'name'])->get();
            }
            if($request->has('cat_type_data') && $request->input('cat_type_data') == true) {
                $catalogs['cat_type_data'] = CatTypeData::select(['id', 'name'])->get();
            }
            if($request->has('cat_sat_concepts') && $request->input('cat_sat_concepts') == true) {
                $catalogs['cat_sat_concepts'] = CatSatConcept::select(['id', 'name', 'identifier', 'cat_concept_type_id'])->get();
            }
            if($request->has('cat_bank_accounts') && $request->input('cat_bank_accounts') == true) {
                $catalogs['cat_bank_accounts'] = CatBankAccount::select(['id', 'name', 'account'])->get();
            }
            if($request->has('incident_types') && $request->input('incident_types') == true) {
                $catalogs['incident_types'] = CatEmployeeIncidentType::select(['id', 'name'])->get();
            }
            if($request->has('off_work_reasons') && $request->input('off_work_reasons') == true) {
                $catalogs['off_work_reasons'] = CatOffWorkReason::select(['id', 'name'])->get();
            }
            if($request->has('clients') && $request->input('clients') == true) {
                $catalogs['clients'] = Client::select(['id', 'name', 'acronym'])->get();
            }
            if($request->has('months') && $request->input('months') == true) {
                $catalogs['months'] = CatMonth::select(['id', 'name', 'isActive'])->orderBy('id', 'asc')->get();
            }
            if($request->has('projects') && $request->input('projects') == true) {
                $catalogs['projects'] = Project::select(['id', 'project_key', 'speciality', 'specific', 'unit_id'])->get();
            }
            if($request->has('payment_status') && $request->input('payment_status') == true) {
                $catalogs['payment_status'] = CatPaymentStatuses::select(['id', 'name'])->orderBy('name', 'asc')->get();
            }
            if($request->has('user_projects') && $request->input('user_projects') == true) {
                $userProjects = Project::all();
                $catalogs['user_projects'] = [];
                foreach($userProjects as $project) {
                    array_push($catalogs['user_projects'], [
                        'id' => $project->id,
                        'name' => $project->Unit->number . "-" . $project->project_key . "-" . $project->speciality . "-" . $project->specific,
                    ]);
                }

            }
            if($request->has('cat_custom_fields') && $request->input('cat_custom_fields') == true) {
                $customFields = CatCustomField::select(['id', 'name','cat_modules_id','length','isRequired','cat_type_data_id'])->get();
                foreach($customFields as $key=>$customField){
                  //  return $customField;
                    if($customField->cat_type_data_id == 3){
                        $customFields[$key]->model = [];
                    }else{
                        $customFields[$key]->model = '';
                    }
                }
                $catalogs['cat_custom_fields'] = $customFields;
            }
            if($request->has('law_vacations') && $request->input('law_vacations') == true) {
                $catalogs['law_vacations'] = LawVacations::select(['id', 'name'])->orderBy('name', 'asc')->get();
            }
            if($request->has('vacations_types') && $request->input('vacations_types') == true) {
                $catalogs['vacations_types'] = CatVacationsType::select(['id', 'name'])->orderBy('name', 'asc')->get();
            }

            //[GMM]
            if($request->has('entidades') && $request->input('entidades') == true) {
                $catalogs['entidades'] = entidades::select(['ENTIDADFEDERATIVAID', 'ENTIDADFEDERATIVANOMBRE', 'ENTIDADFEDERATIVAABREVIACION'])->orderBy('ENTIDADFEDERATIVANOMBRE', 'asc')->get();
            }
            if($request->has('municipios') && $request->input('municipios') == true) {
                $catalogs['municipios'] = municipios::select(['ID', 'MUNICIPIOID', 'MUNICIPIONOMBRE', 'ENTIDADFEDERATIVAID'])->orderBy('MUNICIPIONOMBRE', 'asc')->get();
            }
            if($request->has('localidades') && $request->input('localidades') == true) {
                $catalogs['localidades'] = localidades::select(['ID', 'LOCALIDADID', 'LOCALIDADNOMBRE', 'MUNICIPIOID', 'ENTIDADFEDERATIVAID'])
                                                        ->where('ENTIDADFEDERATIVAID', $request->input('entidad_id'))
                                                        ->where('MUNICIPIOID', $request->input('municipio_id'))
                                                        ->orderBy('LOCALIDADNOMBRE','asc')->get();
            }

            //maximos ids
            if($request->has('cucops') && $request->input('cucops') == true) {
                $catalogs['cucops'] = CucopModel::max('id') + 1;
            }
            if($request->has('vialidad') && $request->input('vialidad') == true) {
                $catalogs['vialidad'] = VialidadesModel::max('id') + 1;
            }
            if($request->has('entidad') && $request->input('entidad') == true) {
                $catalogs['entidad'] = entidades::max('ENTIDADFEDERATIVAID') + 1;
            }
            if($request->has('municipio') && $request->input('municipio') == true) {
                $catalogs['municipio'] = municipios::max('MUNICIPIOID') + 1;
            }
            if($request->has('localidad') && $request->input('localidad') == true) {
                $catalogs['localidad'] = localidades::max('LOCALIDADID') + 1;
            }
            if($request->has('acreditacion') && $request->input('acreditacion') == true) {
                $catalogs['acreditacion'] = Acreditacion::max('ESTATUSACREDITACIONID') + 1;
            }
            if($request->has('estrato') && $request->input('estrato') == true) {
                $catalogs['estrato'] = Estrato::max('ESTRATOUNIDADID') + 1;
            }
            if($request->has('asentamientos') && $request->input('asentamientos') == true) {
                $catalogs['asentamientos'] = Asentamientos::max('TIPOASENTAMIENTOID') + 1;
            }
            if($request->has('establecimientos') && $request->input('establecimientos') == true) {
                $catalogs['establecimientos'] = establecimientos::max('TIPOESTABLECIMIENTOID') + 1;
            }
            if($request->has('operacion') && $request->input('operacion') == true) {
                $catalogs['operacion'] = operacion::max('ESTATUSOPERACIONID') + 1;
            }
            if($request->has('nivel_atencion') && $request->input('nivel_atencion') == true) {
                $catalogs['nivel_atencion'] = nivel_atencion::max('NIVELATENCIONID') + 1;
            }
            if($request->has('tipologia') && $request->input('tipologia') == true) {
                $catalogs['tipologia'] = tipologia::max('id') + 1;
            }
            


            return $this->genResponse(200,  ['catalogs' => $catalogs] );

        } catch (\Exception $e) {

            return $this->genResponse(400, null, $e->getMessage());
        }

    }

    /* Get states by country for catalogs */
    public function getStatesByCountry($country) {
        try {
            $states = CatState::select(['id', 'name'])
                ->where('cat_country_id', $country)
                ->orderBy('name', 'asc')->get();
            return response()->json([
                'success' => true,
                'states' => $states
            ], 200);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error has ocurred'
            ], 400);
        }
    }

}
