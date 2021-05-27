<?php

use App\Http\Controllers\API\Psp\ClientController;

Route::group(['middleware' => ['auth:api']], function () {

    Route::resource('clients', ClientController::class);

});
