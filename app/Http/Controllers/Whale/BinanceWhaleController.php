<?php

namespace App\Http\Controllers\Whale;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Whales\WhaleBtceth;
use Binance;

use Session;

class BinanceWhaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $whales = WhaleBtcEth::where('status', 'Open')->where('exchange','Binance')->get();
        $basePrice = $this->getBasePrice();
        return view('whales.whalebinances.index')->withWhales($whales)->withBaseprice($basePrice);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('whales.whalebinances.create');
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
            'exchange' => 'required',
            'percentage' => 'required|numeric',
            'volume' => 'required|numeric'
        ));

        //get base price
        $basePrice = $this->getBasePrice();

        //store in the database
        $whale = new WhaleBtceth;

        //Key
        $whale->exchange = $request->exchange;
        $whale->percentage = $request->percentage;
        $whale->volume = $request->volume;

        //Fill boolean
        $whale->bid_order = ($request->bidCheckbox=="on") ? true : false ;
        $whale->ask_order = ($request->askCheckbox=="on") ? true : false ;
        $whale->auto_replace = ($request->replaceCheckbox=="on") ? true : false ;

        //Price
        $whale->base_rate = $basePrice;
        
        if ($whale->bid_order==true) {
            $whale->bid = round($basePrice*(1-(($request->percentage)/100)),5);
            $buy = Binance::limitBuy('ETHBTC',$whale->volume,$whale->bid);
            $whale->bid_id = $buy['orderId'];
        } 
        
        if ($whale->ask_order==true) {
            $whale->ask = round($basePrice*(1+(($request->percentage)/100)),5);
            $sell = Binance::limitSell('ETHBTC',$whale->volume,$whale->ask);
            $whale->ask_id = $sell['orderId'];
        }

        $whale->save();

        Session::flash('success', 'The orders were successfully placed!');
        return redirect()->route('whalebinances.show', $whale->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $whale = WhaleBtceth::find($id);
        return view('whales.whalebinances.show')->withWhale($whale);
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

    public function getBasePrice()
    {
        $book = Binance::getOrderBooks('ETHBTC','5');
        $baseprice = ($book['bids'][0][0]+$book['bids'][0][0])/2;
        return $baseprice;
    }

    public function cancel($id)
    {
        $whale = WhaleBtcEth::find($id);

        //cancel order

        if ($whale->bid_order==true) {$cancelbuy = Binance::cancelOrder('ETHBTC',$whale->bid_id);} 
        if ($whale->ask_order==true) {$cancelsell = Binance::cancelOrder('ETHBTC',$whale->ask_id);}
        
        $whale->status = 'Cancelled';
        $whale->save();

        Session::flash('success', 'The orders were successfully cancelled!');
        return redirect()->route('whalekrakens.show', $whale->id);
    }

    public function canceltest()
    {

        //cancel order

        $cancelbuy = Binance::cancelOrder('ETHBTC',93777568);

        dd($cancelbuy);

    }
}
