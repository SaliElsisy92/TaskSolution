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

Route::prefix('blogmodule')->group(function() {
    Route::get('/', 'BlogModuleController@index');
    Route::get('/create','BlogModuleController@create');
    Route::Post('/','BlogModuleController@store');

    Route::get('/{id}/edit','BlogModuleController@edit');
    Route::PUT('/{id}','BlogModuleController@update');


    Route::DELETE('/{id}','BlogModuleController@destroy');
});
