<?php

namespace App\Http\Controllers\Whale;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Kraken\KrakenController;
use App\Http\Controllers\Kraken\KrakenArbi;
use App\Whales\WhaleBtceth;

use Session;

class KrakenWhaleController extends Controller
{
    public function index()
    {
        $whales = WhaleBtcEth::where('status', 'Open')->where('exchange','Kraken')->get();
        $basePrice = $this->getBasePrice();
        return view('whales.whalekrakens.index')->withWhales($whales)->withBaseprice($basePrice);
    }

    public function create()
    {
        return view('whales.whalekrakens.create');
    }

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
        $order = new KrakenArbi;
        
        if ($whale->bid_order==true) {
            $whale->bid = round($basePrice*(1-(($request->percentage)/100)),5);
            $buy = $order->PlaceOrderWhale('XETHXXBT','buy',$whale->bid,$whale->volume);
            $buydata = json_decode($buy);
            $whale->bid_id = $buydata->result->txid[0];
        } 
        
        if ($whale->ask_order==true) {
            $whale->ask = round($basePrice*(1+(($request->percentage)/100)),5);
            $sell = $order->PlaceOrderWhale('XETHXXBT','sell',$whale->ask,$whale->volume);
            $selldata = json_decode($sell);
            $whale->ask_id = $selldata->result->txid[0];
        }

        $whale->save();

        Session::flash('success', 'The orders were successfully placed!');
        return redirect()->route('whalekrakens.show', $whale->id);
    }

    public function show($id)
    {
        $whale = WhaleBtceth::find($id);
        return view('whales.whalekrakens.show')->withWhale($whale);
    }

    public function replace($id)
    {
     
        //get base price
        $basePrice = $this->getBasePrice();

        //update the database

        $whale = WhaleBtceth::find($id);

        $replacewhale = new WhaleBtceth;

        //Key
        $replacewhale->exchange = $whale->exchange;
        $replacewhale->volume = $whale->volume;
        $replacewhale->percentage = $whale->percentage;
        $replacewhale->bid_order = $whale->bid_order;
        $replacewhale->ask_order = $whale->ask_order;
        $replacewhale->auto_replace = $whale->auto_replace;

        //Price
        $replacewhale->base_rate = $basePrice;
        $order = new KrakenArbi;

        if ($whale->bid_order==true) {
            $replacewhale->bid = round($basePrice*(1-(($whale->percentage)/100)),5);
            $cancelbuy = $order->CancelOrder($whale->bid_id);
            $buy = $order->PlaceOrderWhale('XETHXXBT','buy',$whale->bid,$whale->volume);
            $buydata = json_decode($buy);
            $replacewhale->bid_id = $buydata->result->txid[0];
        } 
        
        if ($whale->ask_order==true) {
            $replacewhale->ask = round($basePrice*(1+(($whale->percentage)/100)),5);
            $cancelsell = $order->CancelOrder($whale->ask_id);
            $sell = $order->PlaceOrderWhale('XETHXXBT','sell',$whale->ask,$whale->volume);
            $selldata = json_decode($sell);
            $replacewhale->ask_id = $selldata->result->txid[0];
        }

        $replacewhale->save();
        $whale->status = 'Replaced';
        $whale->save();

        Session::flash('success', 'The orders were successfully replaced!');
        return redirect()->route('whalekrakens.show', $replacewhale->id);
        
    }

    public function cancel($id)
    {
        $whale = WhaleBtcEth::find($id);

        //cancel order
        $order = new KrakenArbi;

        if ($whale->bid_order==true) {$cancelbuy = $order->CancelOrder($whale->bid_id);} 
        if ($whale->ask_order==true) {$cancelsell = $order->CancelOrder($whale->ask_id);}
        
        $whale->status = 'Cancelled';
        $whale->save();

        Session::flash('success', 'The orders were successfully cancelled!');
        return redirect()->route('whalekrakens.show', $whale->id);
    }

    public function replaceAll()
    {
     
        $whales = WhaleBtcEth::where('status', 'Open')->get();

        //get base price
        $basePrice = $this->getBasePrice();

        //update the database
        $order = new KrakenArbi;

        foreach ($whales as $whale) {
        
            $replacewhale = new WhaleBtceth;

            $replacewhale->exchange = $whale->exchange;
            $replacewhale->volume = $whale->volume;
            $replacewhale->percentage = $whale->percentage;
            $replacewhale->base_rate = $basePrice;
            $replacewhale->bid_order = $whale->bid_order;
            $replacewhale->ask_order = $whale->ask_order;
            $replacewhale->auto_replace = $whale->auto_replace;
            $order = new KrakenArbi;
    
            if ($whale->bid_order==true) {
                $replacewhale->bid = round($basePrice*(1-(($whale->percentage)/100)),5);
                $cancelbuy = $order->CancelOrder($whale->bid_id);
                $buy = $order->PlaceOrderWhale('XETHXXBT','buy',$whale->bid,$whale->volume);
                $buydata = json_decode($buy);
                $replacewhale->bid_id = $buydata->result->txid[0];
            } 
            
            if ($whale->ask_order==true) {
                $replacewhale->ask = round($basePrice*(1+(($whale->percentage)/100)),5);
                $cancelsell = $order->CancelOrder($whale->ask_id);
                $sell = $order->PlaceOrderWhale('XETHXXBT','sell',$whale->ask,$whale->volume);
                $selldata = json_decode($sell);
                $replacewhale->ask_id = $selldata->result->txid[0];
            }
    
            $replacewhale->save();
            $whale->status = 'Replaced';
            $whale->save();
        }

        Session::flash('success', 'All open orders were successfully replaced!');
        return redirect()->route('whalekrakens.index');
        
    }

    public function cancelAll()
    {

        $whales = WhaleBtcEth::where('status', 'Open')->get();
        $order = new KrakenArbi;

        //cancel order
        foreach ($whales as $whale) {
            
            if ($whale->bid_order==true) {$cancelbuy = $order->CancelOrder($whale->bid_id);} 
            if ($whale->ask_order==true) {$cancelsell = $order->CancelOrder($whale->ask_id);}
            
            $whale->status = 'Cancelled';
            $whale->save();
        }

        Session::flash('success', 'The orders were successfully cancelled!');
        return redirect()->route('whalekrakens.index');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function getBasePrice()
    {
        $json = file_get_contents('https://api.kraken.com/0/public/Depth?pair=ETHXBT&count=1');
        $data = json_decode($json);
        
        $basePrice = ($data->result->XETHXXBT->bids[0][0]+$data->result->XETHXXBT->asks[0][0])/2;

        return $basePrice;

    }
}
