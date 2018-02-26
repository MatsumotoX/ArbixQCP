<?php

namespace App\Http\Controllers\Whale;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Kraken\KrakenController;
use App\Http\Controllers\Kraken\KrakenArbi;
use App\Whales\WhaleKraken;
use Session;

class KrakenWhaleController extends Controller
{
    public function index()
    {
        $whales = WhaleKraken::where('status', 'Open')->get();
        $basePrice = $this->getBasePrice();
        return view('whalekrakens.index')->withWhales($whales)->withBaseprice($basePrice);
    }

    public function create()
    {
        return view('whalekrakens.create');
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
        $whale = new WhaleKraken;

        $whale->base_rate = $basePrice;
        $whale->bid = round($basePrice*(1-(($request->percentage)/100)),5);
        $whale->ask = round($basePrice*(1+(($request->percentage)/100)),5);
        $whale->exchange = $request->exchange;
        $whale->percentage = $request->percentage;
        $whale->volume = $request->volume;

        //place order

        $order = new KrakenArbi;
        $buy = $order->PlaceOrderWhale('XETHXXBT','buy',$whale->bid,$whale->volume);
        $sell = $order->PlaceOrderWhale('XETHXXBT','sell',$whale->ask,$whale->volume);
        $buydata = json_decode($buy);
        $selldata = json_decode($sell);
        
        $whale->bid_id = $buydata->result->txid[0];
        $whale->ask_id = $selldata->result->txid[0];

        $whale->save();

        Session::flash('success', 'The orders were successfully placed!');

        return redirect()->route('whalekrakens.show', $whale->id);
    }

    public function show($id)
    {
        $whale = WhaleKraken::find($id);
        return view('whalekrakens.show')->withWhale($whale);

        
    }

    public function replace($id)
    {
     
        //get base price
        $basePrice = $this->getBasePrice();

        //update the database

        $whale = WhaleKraken::find($id);
        $replacewhale = new WhaleKraken;
        $replacewhale->base_rate = $basePrice;
        $replacewhale->bid = round($basePrice*(1-(($whale->percentage)/100)),5);
        $replacewhale->ask = round($basePrice*(1+(($whale->percentage)/100)),5);
        $replacewhale->exchange = $whale->exchange;
        $replacewhale->volume = $whale->volume;
        $replacewhale->percentage = $whale->percentage;

        //replace order

        $order = new KrakenArbi;
        $cancelbuy = $order->CancelOrder($whale->bid_id);
        $cancelsell = $order->CancelOrder($whale->ask_id);
        $buy = $order->PlaceOrderWhale('XETHXXBT','buy',$whale->bid,$whale->volume);
        $sell = $order->PlaceOrderWhale('XETHXXBT','sell',$whale->ask,$whale->volume);
        $buydata = json_decode($buy);
        $selldata = json_decode($sell);
        
        $replacewhale->bid_id = $buydata->result->txid[0];
        $replacewhale->ask_id = $selldata->result->txid[0];

        $replacewhale->save();
        $whale->status = 'Replaced';
        $whale->save();

        Session::flash('success', 'The orders were successfully replaced!');

        return redirect()->route('whalekrakens.show', $replacewhale->id);
        
    }

    public function replaceAll()
    {
     
        $whales = WhaleKraken::where('status', 'Open')->get();

        //get base price
        $basePrice = $this->getBasePrice();

        //update the database

        
        $order = new KrakenArbi;

        foreach ($whales as $whale) {
        
            $replacewhale = new WhaleKraken;
            $replacewhale->base_rate = $basePrice;
            $replacewhale->bid = round($basePrice*(1-(($whale->percentage)/100)),5);
            $replacewhale->ask = round($basePrice*(1+(($whale->percentage)/100)),5);
            $replacewhale->exchange = $whale->exchange;
            $replacewhale->volume = $whale->volume;
            $replacewhale->percentage = $whale->percentage;
    
            //replace order
    
            $order = new KrakenArbi;
            $cancelbuy = $order->CancelOrder($whale->bid_id);
            $cancelsell = $order->CancelOrder($whale->ask_id);
            $buy = $order->PlaceOrderWhale('XETHXXBT','buy',$whale->bid,$whale->volume);
            $sell = $order->PlaceOrderWhale('XETHXXBT','sell',$whale->ask,$whale->volume);
            $buydata = json_decode($buy);
            $selldata = json_decode($sell);
            
            $replacewhale->bid_id = $buydata->result->txid[0];
            $replacewhale->ask_id = $selldata->result->txid[0];
    
            $replacewhale->save();
            $whale->status = 'Replaced';
            $whale->save();
        }

        Session::flash('success', 'All open orders were successfully replaced!');

        return redirect()->route('whalekrakens.index');
        
    }

    public function cancelAll()
    {

        $whales = WhaleKraken::where('status', 'Open')->get();
        $order = new KrakenArbi;

        //cancel order
        foreach ($whales as $whale) {
            
            $cancelbuy = $order->CancelOrder($whale->bid_id);
            $cancelsell = $order->CancelOrder($whale->ask_id);
            
            $whale->status = 'Cancelled';

            $whale->save();
        }

        Session::flash('success', 'The orders were successfully cancelled!');
        return redirect()->route('whalekrakens.index');
    }

    public function cancel($id)
    {

        $whale = WhaleKraken::find($id);

        //cancel order

        $order = new KrakenArbi;
        $cancelbuy = $order->CancelOrder($whale->bid_id);
        $cancelsell = $order->CancelOrder($whale->ask_id);
        
        $whale->status = 'Cancelled';

        $whale->save();

        Session::flash('success', 'The orders were successfully cancelled!');
        return redirect()->route('whalekrakens.show', $whale->id);
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
