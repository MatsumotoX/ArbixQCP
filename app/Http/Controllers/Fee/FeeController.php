<?php

namespace App\Http\Controllers\Fee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\MarketFee;
use Session;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all the blog posts in it from the database
        $fees = MarketFee::all();

        // return a view and pass in the above variable
        return view('fees.index')->withFees($fees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fees.create');
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
            'exchange' => 'required|max:20|unique:market_fees,exchange',
            'fee_taker' => 'required|numeric',
            'fee_maker' => 'required|numeric'
        ));

        //store in the database
        $fee = new MarketFee;

        $fee->exchange = $request->exchange;
        $fee->fee_taker = $request->fee_taker;
        $fee->fee_maker = $request->fee_maker;

        $fee->save();

        Session::flash('success', 'The fee was successfully saved!');

        return redirect()->route('fees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fee = MarketFee::find($id);
        return view('fees.show')->withFee($fee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the database and save as var
        $fee = MarketFee::find($id);
        // return the view and pass in the var we previously created
        return view('fees.edit')->withFee($fee);
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
        // Validate the data
        $this->validate($request, array(
            'exchange' => 'required|max:20',
            'fee_taker' => 'required|numeric',
            'fee_maker' => 'required|numeric'
        ));
        // Save the data to the database
        $fee = MarketFee::find($id);

        $fee->exchange = $request->input('exchange');
        $fee->fee_taker = $request->input('fee_taker');
        $fee->fee_maker = $request->input('fee_maker');

        $fee->save();

        // Set flash data with success message
        Session::flash('success', 'The fee was successfully updated.');

        // Redirect with flash data to fees.show
        return redirect()->route('fees.show', $fee->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fee = MarketFee::find($id);

        $fee->delete();

        Session::flash('success', 'The fee was successfully deleted.');

        return redirect()->route('fees.index');
    }
}
