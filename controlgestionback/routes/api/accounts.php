<?php

use App\Http\Controllers\API\Admin\Catalogs\BankAccountController;

Route::group(['middleware' => ['auth:api']], function () {

    Route::group(['prefix' => 'admin'], function () {
        Route::group(['prefix' => 'catalogs'], function () {
            Route::resource('bank-accounts', BankAccountController::class);
        });
    });

});