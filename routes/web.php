<?php

use App\Models\Client;
use Illuminate\Support\Facades\Route;

    // Teste get por Sanctum Laravel
    Route::get('teste',function(){
        $client = Client::first();

        $token = $client->createToken('token-teste',['*']);

        dd($token->plainTextToken);
    });

Route::prefix('admin')
        ->namespace('Admin')
        ->middleware('auth')
        ->group(function(){

    // Route::get('teste-acl',function(){
    //     dd(auth()->user()->isAdmin());
    // });
    /**
     * Route Table
     */
    Route::any('tenants/search','TenantController@search')->name('tenants.search');
    Route::resource('tenants','TenantController');

    /**
     * Route Table
     */
    Route::any('tables/search','TableController@search')->name('tables.search');
    Route::resource('tables','TableController');


     /**
     * Product x Category
     */
    Route::get('products/{id}/category/{idCategory}/detach', 'CategoryProductController@detachCategoryProduct')->name('products.category.detach');
    Route::post('products/{id}/categories', 'CategoryProductController@attachCategoriesProduct')->name('products.categories.attach');
    Route::any('products/{id}/categories/create', 'CategoryProductController@categoriesAvailable')->name('products.categories.available');
    Route::get('products/{id}/categories', 'CategoryProductController@categories')->name('products.categories');
    Route::get('categories/{id}/products', 'CategoryProductController@products')->name('categories.products');


    /**
     * Route Products
     */
    Route::any('products/search','ProductController@search')->name('products.search');
    Route::resource('products','ProductController');


    /**
     * Route Categories
     */
    Route::any('categories/search','CategoryController@search')->name('categories.search');
    Route::resource('categories','CategoryController');
    
    /**
     * Route Usuarios
     */
    Route::any('users/search','UserController@search')->name('users.search');
    Route::resource('users','UserController');

    /**
     * Plans x Profiles
     */
    Route::get('plans/{id}/profile/{idProfile}/detach', 'ACL\PlanProfileController@detachProfilePlan')->name('plans.profile.detach');
    Route::post('plans/{id}/profiles', 'ACL\PlanProfileController@attachProfilesPlan')->name('plans.profiles.attach');
    Route::any('plans/{id}/profiles/create', 'ACL\PlanProfileController@profilesAvailable')->name('plans.profiles.available');
    Route::get('plans/{id}/profiles', 'ACL\PlanProfileController@profiles')->name('plans.profiles');
    Route::get('profiles/{id}/plans', 'ACL\PlanProfileController@plans')->name('profiles.plans');

    /**
     * Permission x Profile
     */
    Route::get('profiles/{id}/permissions/{idPermission}/detach','ACL\PermissionProfileController@detach')->name('profiles.permissions.detach');
    Route::post('profiles/{id}/permissions/store','ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
    Route::any('profiles/{id}/permissions/created','ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
    Route::get('profiles/{id}/permissions','ACL\PermissionProfileController@permissions')->name('profiles.permissions');
    Route::get('permissions/{id}/profiles','ACL\PermissionProfileController@profiles')->name('permissions.profiles');

    /**
     * Route Permissions
     */
    Route::any('permissions/search','ACL\PermissionController@search')->name('permissions.search')->middleware('can:permissions');
    Route::resource('permissions','ACL\PermissionController')->middleware('can:permissions');

    /**
     * Route Profiles
     */
    Route::any('profiles/search','ACL\ProfileController@search')->name('profiles.search')->middleware('can:profiles');
    Route::resource('profiles','ACL\ProfileController')->middleware('can:profiles');

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


/**
 * Site Routes
 */
Route::get('/','Site\SiteController@index')->name('site.home');
Route::get('/plan/{url}','Site\SiteController@plan')->name('plan.subscription');

/**
 * Auth Routes
 */
Auth::routes();
// Para tirar uma funcao do auth padrao.
// Auth::routes(['register'=>false]);
