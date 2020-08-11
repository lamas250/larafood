<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->namespace('Admin')->group(function(){

    /**
     * Route Permissions
     */
    Route::any('permissions/search','ACL\PermissionController@search')->name('permissions.search');
    Route::resource('permissions','ACL\PermissionController');

    /**
     * Route Profiles
     */
    Route::any('profiles/search','ACL\ProfileController@search')->name('profiles.search');
    Route::resource('profiles','ACL\ProfileController');

    /**
     * Route Detail Plans
     */
    Route::delete('plans/{url}/details/{idDetail}','DetailsPlanController@delete')->name('details.plan.delete');
    Route::get('plans/{url}/details/{idDetail}/show','DetailsPlanController@show')->name('details.plan.show');
    Route::put('plans/{url}/details/{idDetail}','DetailsPlanController@update')->name('details.plan.update');
    Route::get('plans/{url}/details/{idDetail}/edit','DetailsPlanController@edit')->name('details.plan.edit');
    Route::post('plans/{url}/details','DetailsPlanController@store')->name('details.plan.store');
    Route::get('plans/{url}/details/create','DetailsPlanController@create')->name('details.plan.create');
    Route::get('plans/{url}/details','DetailsPlanController@index')->name('details.plan.index');

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
