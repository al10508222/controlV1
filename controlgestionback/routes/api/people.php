<?php

use App\Http\Controllers\API\Psp\PeopleController;


Route::group(['middleware' => ['auth:api']], function () {

    Route::resource('people', PeopleController::class);

    Route::post('people-count', [PeopleController::class, 'getCountEmployees']);
    Route::post('people-gender', [PeopleController::class, 'getMaleEmployees']);
    Route::post('people-gender-female', [PeopleController::class, 'getFemaleEmployees']);
    Route::post('people-certification', [PeopleController::class, 'getCountEmployeesCertification']);
});
