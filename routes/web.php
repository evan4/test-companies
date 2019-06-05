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
        'as' => 'company-edit', 
        'uses' => 'HomeController@editCompany'
    ]);

    Route::get('/employees', [
        'as' => 'employees', 
        'uses' => 'HomeController@showEmployees'
    ]);
    
    Route::delete('/employee-delete/{id}', [
        'as' => 'employee-delete', 
        'uses' => 'EmployeeController@destroy'
    ]);

    Route::get('/comments', [
        'as' => 'comments', 
        'uses' => 'HomeController@showComments'
    ]);

    Route::post('/comment-create', [
        'as' => 'comment-create', 
        'uses' => 'CommentController@store'
    ]);
    

    Route::get('/company-delete', [
        'as' => 'company-delete', 
        'uses' => 'CompanyController@destroy'
    ]);
    

    Route::post('/company-update', [
        'as' => 'company-update', 
        'uses' => 'CompanyController@update'
    ]);

    Route::get('/company-photo', [
        'as' => 'company-photo', 
        'uses' => 'CompanyController@getPhoto'
    ]);

    Route::post('/company-updatePhoto', [
        'as' => 'company-updatePhoto', 
        'uses' => 'CompanyController@updatePhoto'
    ]);

});