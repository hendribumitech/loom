<?php

use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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
    return redirect('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tes', [App\Http\Controllers\HomeController::class, 'tes']);

//Route::group(['middleware' => ['auth','role:administrator']],function (){
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'base'], function () {
        Route::resource('import', Base\ImportController::class, ['as' => 'base']);
        Route::resource('export', Base\ExportController::class, ['as' => 'base']);
        Route::resource('roles', Base\RoleController::class, ['as' => 'base']);
        Route::resource('permissions', Base\PermissionController::class, ['as' => 'base']);
        Route::resource('users', Base\UserController::class, ['as' => 'base']);
        Route::resource('menus', Base\MenusController::class, ['as' => 'base']);        

        Route::resource('machines', Base\MachineController::class, ["as" => 'base']);
        Route::resource('machines.machineCapacities', Base\MachineCapacityController::class, ["as" => 'base']);
        Route::resource('uoms', Base\UomController::class, ["as" => 'base']);
        Route::resource('shiftments', Base\ShiftmentController::class, ["as" => 'base']);
        Route::resource('products', Base\ProductController::class, ["as" => 'base']);
        Route::resource('categoryOffs', Base\CategoryOffController::class, ["as" => 'base']);
    });

    Route::group(['prefix' => 'manufacture'], function () {
        Route::resource('machineConditions', Manufacture\MachineConditionController::class, ["as" => 'manufacture']);
        Route::resource('machineResults', Manufacture\MachineResultController::class, ["as" => 'manufacture']);        
        Route::resource('machineProductivities', Manufacture\MachineProductivityController::class, ["as" => 'manufacture']);        
        Route::get('machineAvailabilities/resume', [App\Http\Controllers\Manufacture\ResumeMachineAvailabilityController::class, 'index'])->name('manufacture.machineAvailabilities.resume');
        Route::get('machineAvailabilities/generate', [App\Http\Controllers\Manufacture\ResumeMachineAvailabilityController::class, 'generate'])->name('manufacture.machineAvailabilities.generate');
        Route::resource('machineAvailabilities', Manufacture\MachineAvailabilityController::class, ["as" => 'manufacture']);
        
    });
    

    Route::get('/selectAjax', [App\Http\Controllers\SelectAjaxController::class, 'index'])->name('selectAjax');
//    Route::get('/events', [App\Http\Controllers\EventsController::class, 'index'])->name('events.index');
});

// builder generator
Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');
Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');
Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback'); 
Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');

Route::group(['prefix' => 'artisan'], function () {
    Route::get('clear_cache', function(){
        Artisan::call('cache:clear');
    });     
});

