<?php

use App\Http\Controllers\API\EmployeeController;

Route::group(['middleware' => ['auth:api']], function () {
    Route::group(['prefix' => 'audit-logs'], function () {
        Route::get('employees/{id?}', [EmployeeController::class, 'auditElement']);
    });
});
