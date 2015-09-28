<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use DB;
use App\IotLog;

class IotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('iot.index');
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
        $type = $request->t;
        $value = $request->v;
        $status = 0;
        
        $log = new IotLog;
        $log->type_id = $type;
        $log->value = $value;
        $log->save();

        return response()->json(['status' => 'ok'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request, $id)
    {
        $days = $request->days;

       // $range = CarbonCarbon::now()->subDays($days);

        $date = new \DateTime;
        $date->modify('-24 hours');
        $formatted_date = $date->format('Y-m-d H:i:s');

        $stats = DB::table('iot_logs')
            // ->where('created_at', '>=', $formatted_date)
            // ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->take(200)
            ->get([
            DB::raw('UNIX_TIMESTAMP(created_at) as date'),
            'value'
        ]);

      return $stats;
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
