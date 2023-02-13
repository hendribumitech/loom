<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();    
});

Route::group(['prefix' => 'base'], function () {    
    Route::resource('customers', \App\Http\Controllers\API\Base\CustomersAPIController::class);
});

Route::group(['prefix' => 'base'], function () {
    Route::resource('machines', App\Http\Controllers\API\Base\Base\MachineAPIController::class);
});


Route::group(['prefix' => 'base'], function () {
    Route::resource('uoms', App\Http\Controllers\API\Base\Base\UomAPIController::class);
});


Route::group(['prefix' => 'base'], function () {
    Route::resource('shiftments', App\Http\Controllers\API\Base\Base\ShiftmentAPIController::class);
});


Route::group(['prefix' => 'manufacture'], function () {
    Route::resource('machine_results', App\Http\Controllers\API\Manufacture\Manufacture\MachineResultAPIController::class);
});


Route::group(['prefix' => 'manufacture'], function () {
    Route::resource('machine_conditions', App\Http\Controllers\API\Manufacture\Manufacture\MachineConditionAPIController::class);
});


Route::group(['prefix' => 'manufacture'], function () {
    Route::resource('machine_productivities', App\Http\Controllers\API\Manufacture\Manufacture\MachineProductivityAPIController::class);
});


Route::group(['prefix' => 'base'], function () {
    Route::resource('products', App\Http\Controllers\API\Base\Base\ProductAPIController::class);
});


Route::group(['prefix' => 'base'], function () {
    Route::resource('category_offs', App\Http\Controllers\API\Base\Base\CategoryOffAPIController::class);
});


Route::group(['prefix' => 'base'], function () {
    Route::resource('machine_capacities', App\Http\Controllers\API\Base\Base\MachineCapacityAPIController::class);
});


Route::group(['prefix' => 'manufacture'], function () {
    Route::resource('machine_availabilities', App\Http\Controllers\API\Manufacture\Manufacture\MachineAvailabilityAPIController::class);
});
