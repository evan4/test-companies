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

Auth::routes();

Route::get('/', 'CompanyController@index')->name('companies.index');

Route::get('/company/{company}', 'CompanyController@show')->name('companies.show');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(array('prefix' => 'admin'), function(){
    Route::get('/company-edit', [
        'as' => 'edit', 
        'uses' => 'HomeController@editCompany'
    ]);

    Route::get('/employees', [
        'as' => 'employees', 
        'uses' => 'HomeController@showEmployees'
    ]);

    Route::get('/comments', [
        'as' => 'comments', 
        'uses' => 'HomeController@showComments'
    ]);

    Route::get('/deleteCompany', [
        'as' => 'deleteCompany', 
        'uses' => 'HomeController@deleteCompany'
    ]);
    

    Route::post('/company-update', [
        'as' => 'update', 
        'uses' => 'HomeController@updateCompany'
    ]);

});