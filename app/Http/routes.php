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



Route::get('/', function () {
    // echo strlen("t=c190a50aa8f292b847ba6627ee888c71&s=1&c=1234567890");
    return view('admin_template'); 
});

Route::resource('terminal', 'TerminalsController');
Route::resource('location', 'LocationsController');
Route::resource('employee', 'EmployeesController');


Route::get('anydata', 'EmployeelogController@anydata');
Route::resource('employeelog', 'EmployeelogController');


Route::group(array('prefix' => 'api'), function()
{
   Route::post('timelog', 'TimelogController@store');
});//


use App\EmployeeTime;
use App\Terminal;
use App\Employee;

Route::get('deletelog',function(){
	DB::table('employee_times')->truncate();
});
