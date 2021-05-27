<?php

use App\Http\Controllers\API\Psp\ProjectController;

Route::group(['middleware' => ['auth:api']], function () {

    Route::resource('projects', ProjectController::class);

});
