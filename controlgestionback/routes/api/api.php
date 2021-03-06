<?php

use App\Http\Controllers\API\IsssteDeductionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Admin\UserController;
use App\Http\Controllers\API\Admin\CatalogsController;
use App\Http\Controllers\API\Admin\Catalogs\DocumentController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\ReportGroupsController;
use App\Http\Controllers\API\ReportManagerController;
use App\Http\Controllers\API\EmployeeDocumentsController;
use App\Http\Controllers\API\{
    ModuleController,
    PermissionController,
    ProfileController,
    StatisticsController,
    FileUploadController,
    MovementController
};
use App\Http\Controllers\API\Admin\Catalogs\UnitController;
use App\Http\Controllers\API\Admin\Catalogs\CatContractTypeController;
use App\Http\Controllers\API\Admin\Catalogs\LocationController;
use App\Http\Controllers\API\Admin\Catalogs\TabulatorController;
use App\Http\Controllers\API\Admin\Catalogs\CustomFieldsController;
use App\Http\Controllers\API\Admin\PayrollConfig\{
    IsrConfigController,
    EmploymentSubsidiesConfigController,
    ImssDeductionsController
};

use App\Http\Controllers\API\PositionController;
use App\Http\Controllers\API\ConceptController;
use App\Http\Controllers\API\ReceiptController;

use App\Http\Controllers\API\Psp\PaymentLayoutController;

use App\Http\Controllers\API\Provider\PaymentController;
use App\Http\Controllers\API\Provider\ForgotPasswordController;

use App\Http\Controllers\API\Psp\ActivityController;
use App\Http\Controllers\SystemSettingsController;
use App\Models\Catalogs\CatContractType;

use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\API\LawVacationsConfigController;
use App\Models\LawVacations;

use App\Http\Controllers\FiveYearBonusController;
use App\Http\Controllers\API\EmployeeVacationController;
use App\Http\Controllers\API\Admin\Catalogs\CatVacationsTypeController;
use App\Http\Controllers\API\Psp\DashboardController;
//[GMM - 2021-06-01]
use App\Http\Controllers\API\CucopController;
use App\Http\Controllers\API\VialidadesController;
use App\Http\Controllers\API\EntidadesController;
use App\Http\Controllers\API\MunicipiosController;
use App\Http\Controllers\API\LocalidadesController;
use App\Http\Controllers\API\AcreditacionController;
use App\Http\Controllers\API\EstratoController;
use App\Http\Controllers\API\AsentamientosController;
use App\Http\Controllers\API\EstablecimientoController;
use App\Http\Controllers\API\OperacionController;
use App\Http\Controllers\API\NivelAtencionController;
use App\Http\Controllers\API\TipologiaController;
use App\Http\Controllers\API\SubtipologiaController;
use App\Http\Controllers\API\InstitucionesController;
use App\Http\Controllers\API\InstitucionesAdmorController;
use App\Http\Controllers\API\SciansController;
use App\Http\Controllers\API\JurisdiccionesController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('test', function(){
    return response()->json([
        'success' => true,
    ], 200);
});


Route::post('test', function(Illuminate\Http\Request $request){
    $message = 'Hello ' . $request->input('name');
    return response()->json([
        'message' => $message,
        'success' => true,
    ], 200);
});

Route::group(['middleware' => ['cors']], function () {
    //Rutas a las que se permitir?? acceso
});
Route::post('login', [AuthController::class, 'login'])->name('login');
// Route::post("login", [AuthController::class, 'login'])->name('login')->middleware("cors");

Route::get('logout', [AuthController::class, 'logout']);

Route::get('checkTOTP/{usr}', [AuthController::class,'checkTOTP']);
Route::get('activateOTP/{usr}',[AuthController::class,'activateTOTP']);

Route::post('forgot', [ForgotPasswordController::class, 'create']);
Route::get('find/{token}', [ForgotPasswordController::class, 'find']);
Route::post('reset', [ForgotPasswordController::class, 'reset']);

Route::get('admin/config/getConfig', [SystemSettingsController::class, 'getConfig']);

Route::group(['middleware' => ['auth:api']], function () {
    /* Payment ROUTES */
    Route::get('admin/providers/payment/get-pending', [PaymentController::class, 'getPending']);

    //Route::resource('dates', DateController::class);
    Route::group(['prefix' => 'admin'], function () {

        // Route::post('render', [CustomFieldsController::class,'render']);

        Route::group(['prefix' => 'catalogs'], function () {
            Route::get('', [CatalogsController::class,'index']);
            Route::get('get-states/{id}', [CatalogsController::class, 'getStatesByCountry']);
            Route::resource('documents', DocumentController::class);
            Route::resource('units', UnitController::class);
            Route::resource('tabulator', UnitController::class);
            Route::resource('location', LocationController::class);
            Route::resource('custom-fields', CustomFieldsController::class);
            Route::resource('contracts', CatContractTypeController::class);
            Route::resource('tabulators', TabulatorController::class);
            Route::resource('vacations-types', CatVacationsTypeController::class);
            Route::resource('entidades', EntidadesController::class);
            Route::resource('municipios', MunicipiosController::class);
            Route::resource('localidades', LocalidadesController::class);
            Route::resource('acreditacion', AcreditacionController::class);
            Route::resource('estrato', EstratoController::class);
            Route::resource('asentamientos', AsentamientosController::class);
            Route::resource('establecimientos', EstablecimientoController::class);
            Route::resource('operacion', OperacionController::class);
            Route::resource('nivel_atencion', NivelAtencionController::class);
            Route::resource('tipologia', TipologiaController::class);
            Route::resource('subtipologia', SubtipologiaController::class);
            Route::resource('instituciones', InstitucionesController::class);
            Route::resource('instituciones_admor', InstitucionesAdmorController::class);
            Route::resource('scians', SciansController::class);
            Route::resource('jurisdicciones', JurisdiccionesController::class);


        });

        Route::group(['prefix' => 'config'], function() {
            Route::apiResource('law-vacations', LawVacationsConfigController::class);
            Route::apiResource('five-year-bonus', FiveYearBonusController::class);
        });

        Route::resource('users', UserController::class);
        Route::resource('profile', ProfileController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('modules', ModuleController::class);
        Route::resource('isr-config', IsrConfigController::class);
        Route::resource('cucop', CucopController::class);
        Route::resource('vialidades', VialidadesController::class);
        Route::resource('entidades', EntidadesController::class);
        Route::resource('municipios', MunicipiosController::class);
        Route::resource('localidades', LocalidadesController::class);
        Route::resource('acreditacion', AcreditacionController::class);
        Route::resource('estrato', EstratoController::class);
        Route::resource('asentamientos', AsentamientosController::class);
        Route::resource('establecimientos', EstablecimientoController::class);
        Route::resource('operacion', OperacionController::class);
        Route::resource('nivel_atencion', NivelAtencionController::class);
        Route::resource('tipologia', TipologiaController::class);
        Route::resource('subtipologia', SubtipologiaController::class);

        Route::resource('instituciones', InstitucionesController::class);
        Route::resource('instituciones_admor', InstitucionesAdmorController::class);
        Route::resource('scians', SciansController::class);
        Route::resource('jurisdicciones', JurisdiccionesController::class);
        
        Route::get('calculate-isr', [IsrConfigController::class, 'calculate']);
        Route::resource('employment-subsidies-config', EmploymentSubsidiesConfigController::class);
        Route::resource('imss-deductions', ImssDeductionsController::class);
        Route::resource('issste-deductions', IsssteDeductionsController::class);
    });


    // Route::get('municipios', MunicipiosController::class);
    
    Route::post('positions/get-positions-by', [PositionController::class, 'getPositionsBy']);
    Route::post('');
    Route::resource('positions', PositionController::class);
    Route::apiResource('movements', MovementController::class);
    /* Actualizar  ruta a nivel employee */
    Route::get('getUserInfo', [AuthController::class,'userInfo']);
    Route::get('verify', [AuthController::class, 'verify']);
    Route::post('mobile-authorize', [AuthController::class, 'mobileAuthorize']);
    Route::get('get-statistics', [StatisticsController::class, 'getStatistics']);
    // destroyEntry
    
    Route::post('employee-report', [EmployeeController::class, 'employeeReport']);
    Route::get('get-catalog-employee-report', [EmployeeController::class, 'getCatalogEmployeeReport']);
    
    Route::post('employees/entries/{id}', [EmployeeController::class, 'destroyEntry']);
    Route::post('employees/massive-load', [EmployeeController::class, 'massiveLoad']);
    Route::get('employees/by-contract-type/{id}', [EmployeeController::class, 'getAllByContractType']);
    Route::get('employees/search-by-curp', [EmployeeController::class, 'searchByCURP']);
    Route::resource('employees/{id}/vacations', EmployeeVacationController::class);
    Route::resource('employees', EmployeeController::class);
    
    // /api/admin/config/edit
    Route::get('admin/config/edit', [SystemSettingsController::class, 'edit']);
    Route::apiResource('admin/config', SystemSettingsController::class);
    
    Route::patch('concepts/{id}/status', [ConceptController::class, 'patch']);
    Route::get('concepts/get-extraordinary', [ConceptController::class, 'getExtraordinary']);
    Route::resource('concepts', ConceptController::class);
    Route::resource('employees-document', EmployeeDocumentsController::class);
    
    Route::get('payment/order/export', [PaymentLayoutController::class, 'export']);
    Route::get('payment/order/{id}/export-txt', [PaymentLayoutController::class, 'exportTxtLayout']);
    Route::get('payment/order/{id}/export-txt-bbva', [PaymentLayoutController::class, 'exportTxtLayoutBbva']);
    Route::get('payment/order/{id}/export-txt-bbva-account', [PaymentLayoutController::class, 'exportTxtLayoutBbvaAccount']);
    
    /* PAYMENT ACTIVITIES */
    Route::get('/psp/reportActivity', [ActivityController::class, 'index']);
    Route::get('/psp/reportActivity/indexValidated', [ActivityController::class, 'indexValidated']);
    
    Route::post('/psp/reportActivity/validate', [ActivityController::class, 'checkPSP']);
    Route::post('/psp/reportActivity/validated', [ActivityController::class, 'check']);
    Route::post('/psp/reportActivity/decline', [ActivityController::class, 'decline']);
    Route::post('/psp/reportActivity/declined', [ActivityController::class, 'declined']);
    
    /* DASHBOARD PSP */
    Route::post('/psp/dashboard/serviceChart', [DashboardController::class, 'serviceChart']);
    Route::post('/psp/dashboard/serviceProject', [DashboardController::class, 'serviceProject']);
    Route::get('/psp/dashboard/serviceFilters', [DashboardController::class, 'serviceFilters']);

    /**SERVICES REST */
    Route::post('municipiosAll', [MunicipiosController::class, 'ShowMunicipiosAll']);
    Route::post('vialidadesAll', [VialidadesController::class, 'ShowVialidadesAll']);
    Route::post('entidadesAll', [EntidadesController::class, 'ShowEntidadesAll']);
    Route::post('localidadesByFilter', [LocalidadesController::class, 'ShowLocalidadesByFilter']);
    Route::post('cucopsAll', [CucopController::class, 'ShowCucopsAll']);
    Route::post('AcreditacionAll', [AcreditacionController::class, 'ShowAcreditacionAll']);
    Route::post('EstratosUnidad', [EstratoController::class, 'ShowEstratoAll']);
    Route::post('TiposAsentamientos', [AsentamientosController::class, 'ShowAsentamientosAll']);
    Route::post('TiposEstablecimientos', [EstablecimientoController::class, 'ShowEstablecimientosAll']);
    Route::post('StatusOperaciones', [OperacionController::class, 'ShowOperacionAll']);
    Route::post('NivelesAtencion', [NivelAtencionController::class, 'ShowNivelAtencionAll']);
    Route::post('Tipologias', [TipologiaController::class, 'ShowTipologiaAll']);
    Route::post('SubTipologias', [SubtipologiaController::class, 'ShowSubTipologiaAll']);

    Route::post('instituciones', [InstitucionesController::class, 'InstitucionesAll']);
    Route::post('institucionesAdmor', [InstitucionesAdmorController::class, 'InstitucionesAdmorAll']);
    Route::post('scians', [SciansController::class, 'SciansAll']);
    Route::post('jurisdicciones', [JurisdiccionesController::class, 'ShowJurisdiccionesAll']);
    
    
});
Route::group(['prefix' => 'files'], function () {
    Route::post('upload', [FileUploadController::class, 'upload']);
});
Route::get('files/show/{type}/{id}', [FileUploadController::class, 'showFile']);
Route::get('files/image/{id}', [FileUploadController::class, 'getFile']);

Route::get('generatePDF', [ReceiptController::class, 'generatePDF']);

/** Reports */
Route::group(['middleware' => ['auth:api']], function () {
    Route::resource('report-manager', ReportManagerController::class);
});

Route::resource('report-groups', ReportGroupsController::class);

Route::get('tokenGenerate', [AuthController::class, 'login']);
