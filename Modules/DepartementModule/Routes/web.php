<?php

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

Route::prefix('departementmodule')->group(function() {
    Route::get('/', 'DepartementModuleController@index');

    Route::get('/create','DepartementModuleController@create');
    Route::Post('/','DepartementModuleController@store');

    Route::get('/{id}/edit','DepartementModuleController@edit');
    Route::PUT('/{id}','DepartementModuleController@update');


    Route::DELETE('/{id}','DepartementModuleController@destroy');
});
