<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeTime extends Model
{
    public $timestamps = false;

    public static function getLastTen(){
    	return self::select(\DB::raw('concat(first_name, " ", middle_name, " ", last_name ) as fullname,
			IF(sensortype_id = 1,timestamp, null) AS timein,
			IF(sensortype_id = 0,timestamp, null ) AS timeout '),'terminal')
                     ->join('employees', 'employees.id', '=','employee_times.employee_id')
                     ->join('terminals', 'terminals.id', '=','employee_times.terminal_id')
                     ->orderBy('timestamp','desc')
                     ->get();
    }
}
