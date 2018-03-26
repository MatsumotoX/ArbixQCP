<?php

namespace App\Http\Controllers\Fee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Fees\TransferFee;
use Session;

class TransferFeeController extends Controller
{

    public function getIndex($type)
    {
        switch ($type) {
            case 'btc':
                $fees = TransferFee::where('coin_id',0)->get();
                return view('fees.btc')->withFees($fees);
                break;
            
            case 'eth':
                $fees = TransferFee::where('coin_id',1)->get();
                return view('fees.eth')->withFees($fees);
                break;

            case 'xrp':
                $fees = TransferFee::where('coin_id',2)->get();
                return view('fees.xrp')->withFees($fees);
                break;
        }
    }

    public function store(Request $request,$type)
    {
        $fee = new TransferFee;

        switch ($type) {
            case 'btc':
                $fee->coin_id = 0;
                break;
            
            case 'eth':
                $fee->coin_id = 1;                
                break;

            case 'xrp':
                $fee->coin_id = 2;
                break;
        }
        
        $fee->exchange = $request->exchange;
        $fee->fee_deposit = $request->fee_deposit;
        $fee->fee_withdraw = $request->fee_withdraw;

        $fee->save();

        Session::flash('success', 'The fee was successfully saved!');

        return redirect()->route('tfees.index',$type);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fee = TransferFee::find($id);
        return view('fees.fshow')->withFee($fee);
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
        $fee = TransferFee::find($id);
        // return the view and pass in the var we previously created
        return view('fees.fedit')->withFee($fee);
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
        
        // Save the data to the database
        $fee = TransferFee::find($id);

        $fee->exchange = $request->input('exchange');
        $fee->fee_deposit = $request->input('fee_deposit');
        $fee->fee_withdraw = $request->input('fee_withdraw');

        $fee->save();

        // Set flash data with success message
        Session::flash('success', 'The fee was successfully updated.');

        // Redirect with flash data to fees.show
        return redirect()->route('tfees.show', $fee->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fee = TransferFee::find($id);

        switch ($fee->coin_id) {
            case '0':
                $type = 'btc';
                break;
            
            case '1':
                $type = 'eth';
                break;

            case '2':
                $type = 'xrp';
                break;
        }

        $fee->delete();

        Session::flash('success', 'The fee was successfully deleted.');

        

        return redirect()->route('tfees.index',$type);
    }
}
