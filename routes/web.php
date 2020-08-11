<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->namespace('Admin')->group(function(){

    /**
     * Route Detail Plans
     */
    Route::get('plans/{url}/details','DetailPlanController@index')->name('details.plan.index');

    /**
     * Route PLans
     */
    Route::put('plans/{url}','PlanController@update')->name('plans.update');
    Route::get('plans/{url}/edit','PlanController@edit')->name('plans.edit');
    Route::any('plans/search','PlanController@search')->name('plans.search');
    Route::get('plans','PlanController@index')->name('plans.index');
    Route::get('plans/create','PlanController@create')->name('plans.create');
    Route::post('plans','PlanController@store')->name('plans.store');
    Route::get('plans/{url}','PlanController@show')->name('plans.show');
    Route::delete('plans/{url}','PlanController@delete')->name('plans.delete');

 
    /**
     * Home Dashboard
     */

    Route::get('/','PlanController@index')->name('admin.index');
});
