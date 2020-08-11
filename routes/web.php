<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::put('admin/plans/{id}','Admin\PlanController@update')->name('plans.update');
Route::get('admin/plans/{id}/edit','Admin\PlanController@edit')->name('plans.edit');
Route::any('admin/plans/search','Admin\PlanController@search')->name('plans.search');
Route::get('admin/plans','Admin\PlanController@index')->name('plans.index');
Route::get('admin/plans/create','Admin\PlanController@create')->name('plans.create');
Route::post('admin/plans','Admin\PlanController@store')->name('plans.store');
Route::get('admin/plans/{url}','Admin\PlanController@show')->name('plans.show');
Route::delete('admon/plans/{id}','Admin\PlanController@delete')->name('plans.delete');

Route::get('admin','Admin\PlanController@index')->name('admin.index');