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

//routes to call the controller functions
Route::get('/readData', [App\Http\Controllers\DataPopulateController::class,'readData']);
Route::get('/insertUser', [App\Http\Controllers\DataPopulateController::class,'insertUser']);
Route::get('/insertOrder', [App\Http\Controllers\DataPopulateController::class,'insertOrder']);
Route::get('/insertProperties', [App\Http\Controllers\DataPopulateController::class,'insertProperties']);

Route::get('/getIndexData', [App\Http\Controllers\DataPopulateController::class,'getIndexData']);

Route::get('/getCity', [App\Http\Controllers\DataPopulateController::class,'getCity']);
