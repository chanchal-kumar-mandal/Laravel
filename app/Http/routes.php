<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* Default */
Route::get('/', function () {
    return view('welcome');
});

/* Authentication Related */
Route::auth();

Route::get('/home', 'HomeController@index');

/* Employees Related */
Route::get('/add-employee',function(){
   return view('add-employee');
});
Route::get('/employees','EmployeeController@index');
Route::post('/add-employee/submit',['as' => 'addUser' , 'uses' => 'EmployeeController@store']);
Route::get('edit-employee/{id}',function($eid){
   return view('edit-employee', array('eid' => $eid));
});
Route::post('/edit-employee/submit','EmployeeController@update');
Route::get('/delete-employee/{id}', 'EmployeeController@delete');
