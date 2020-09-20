<?php

Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'
],function(){
    Route::get('/tenant/{uuid}','TenantApiController@show');
    Route::get('tenants','TenantApiController@index');

    Route::get('/categories/{url}','CategoryApiController@show');
    Route::get('/categories','CategoryApiController@categoriesByTenant');

    Route::get('/table/{identify}','TableApiController@show');
    Route::get('/tables','TableApiController@tablesByTenant');

    Route::get('/product/{flag}','ProductsApiController@show');
    Route::get('/products','ProductsApiController@productsByTenant');

    Route::post('/client','Auth\RegisterController@store');
});

// Possivel versao 2, mantendo a versao 1
Route::group([
    'prefix' => 'v2',
    'namespace' => 'Api'
],function(){
    Route::get('/tenant/{uuid}','TenantApiController@show');
    Route::get('tenants','TenantApiController@index');

    Route::get('/categories/{url}','CategoryApiController@show');
    Route::get('/categories','CategoryApiController@categoriesByTenant');

    Route::get('/table/{identify}','TableApiController@show');
    Route::get('/tables','TableApiController@tablesByTenant');

    Route::get('/product/{flag}','ProductsApiController@show');
    Route::get('/products','ProductsApiController@productsByTenant');
});