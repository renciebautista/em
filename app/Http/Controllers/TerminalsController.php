<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Terminal;
use Session;

class TerminalsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$terminals = Terminal::all();
    	return view('terminal.index',compact('terminals'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('terminal.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
	        'terminal' => 'required|max:100'
	    ]);

		$terminal = new Terminal;
        $terminal->terminal = $request->terminal;
        $terminal->active = ($request->active == '1') ? 1 : 0;
        $terminal->token = md5(uniqid(mt_rand(), true));
        $terminal->save();

        Session::flash('flash_message', 'Terminal successfully added!');

    	return redirect()->route("terminal.index");
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
		$terminal = Terminal::find($id);
		return view('terminal.edit')->withTerminal($terminal);
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
		$terminal = Terminal::findOrFail($id);
	    $this->validate($request, [
	         'terminal' => 'required|max:100'
	    ]);

	    $terminal->terminal = $request->terminal;
        $terminal->active = ($request->active == '1') ? 1 : 0;
        $terminal->update();

	    Session::flash('flash_message', 'Terminal successfully updated!');

	    return redirect()->route("terminal.index");
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
