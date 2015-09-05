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
    echo strlen("t=c190a50aa8f292b847ba6627ee888c71&s=1&c=1234567890");
    // return view('admin_template'); 
});

Route::resource('terminal', 'TerminalsController');
Route::resource('location', 'LocationsController');
Route::resource('employee', 'EmployeesController');
Route::resource('timelog', 'TimelogController');

Route::get('anydata', 'EmployeelogController@anydata');
Route::resource('employeelog', 'EmployeelogController');

use App\EmployeeTime;
use App\Terminal;
use App\Employee;

Route::get('log',function(){
	$token ='46faddb008b9870cf4c0853fc77f6f70';
    $sensortype = 1;
    $card_no = '1234567890';
    $status = 0;
    // check if valid terminal
    $terminal = Terminal::where('token',$token)->where('active',1)->first();

    if(!empty($terminal)){
        $employee = Employee::where('card_no',$card_no)->where('active',1)->first();
        
        if(!empty( $employee)){
            $timelog = new EmployeeTime;
            $timelog->employee_id = $employee->id;
            $timelog->terminal_id = $terminal->id;
            $timelog->timestamp = Carbon\Carbon::now();
            $timelog->sensortype_id = $sensortype;
            $timelog->save();
            $status = 1;
        }
    }
});
