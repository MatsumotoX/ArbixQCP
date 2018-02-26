<?php

namespace App\Http\Controllers\Signal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Line\LinePushController;
use App\Line\LinePush;
use App\Http\Controllers\ArbotController;
use Session;

class SignalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('signals.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validating data
        $this->validate($request, array(
            'message' => 'required',
        ));

        //store in the database
        $line = new LinePush;

        $line->message = $request->message;
        $line->type = "manual";

        $line->save();

        Session::flash('success', 'A message was successfully sent!');

        $linepush = new LinePushController;
        $linepush->pushMessage($request->message,'C25cf6c120577cb6086ec575eb40cf6c6');

        return redirect()->route('signals.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
