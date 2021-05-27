<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function(){
    $isr = new App\Core\Expression\Formulas\ISR();
    return $isr->calculate();
});

Route::get('nomina',function(){
   return view('pdf_invoice',['data'=>[]]); 
});

