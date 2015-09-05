<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\EmployeeTime;
use App\Terminal;
use App\Employee;
use Carbon\Carbon;

class TimelogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $token = $request->t;
        $sensortype = $request->s;
        $card_no = $request->c;
        $status = 0;
        // check if valid terminal
        $terminal = Terminal::where('token',$token)->where('active',1)->first();

        if(!empty($terminal)){
            $employee = Employee::where('card_no',$card_no)->where('active',1)->first();
            
            if(!empty( $employee)){
                $timelog = new EmployeeTime;
                $timelog->employee_id = $employee->id;
                $timelog->terminal_id = $terminal->id;
                $timelog->timestamp = Carbon::now();
                $timelog->sensortype_id = $sensortype;
                $timelog->save();
                $status = 1;
            }
        }

        return response()->json(['status' => $status],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
