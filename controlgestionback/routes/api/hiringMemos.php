<?php

use App\Http\Controllers\API\Psp\HiringMemoController;
use App\Http\Controllers\API\Psp\HiringMemoDocumentsController;

Route::group(['middleware' => ['auth:api']], function () {

    Route::resource('hiringMemos', HiringMemoController::class);
    Route::resource('hiringMemos-documents', HiringMemoDocumentsController::class);

});
