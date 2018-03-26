<?php

namespace App\Http\Controllers\Whale;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Whales\WhaleBinance;
use App\Whales\WhaleKraken;
use App\Orderbook\Binance\BinanceOrderbook;
use Session;
use Binance;

class WhaleController extends Controller
{
    public function getIndex($exchange,$pair)
    {
        switch ($exchange) {
            case 'binance':

                switch ($pair) {
                    case 'btc':
                        $whales = WhaleBinance::where('coin_id',0)->where('status', 'Open')->get();
                        return view('whales.binances.btc')->withWhales($whales);
                        break;
                    
                    case 'eth':
                        $whales = WhaleBinance::where('coin_id',1)->where('status', 'Open')->get();
                        return view('whales.binances.eth')->withWhales($whales);
                        break;

                    case 'btceth':
                        $whales = WhaleBinance::where('coin_id',3)->where('status', 'Open')->get();
                        return view('whales.binances.btceth')->withWhales($whales);
                        break;
                }
                # code...
                break;
            
            case 'kraken':

                switch ($pair) {
                    case 'btc':
                        return view('whale.kraken.btc');
                        break;
                    
                    case 'eth':
                        return view('whale.kraken.eth');
                        break;

                    case 'xrp':
                        return view('whale.kraken.xrp');
                        break;
                }
                # code...
                break;
        }
        
    }

    public function store(Request $request, $exchange, $pair)
    {

        switch ($exchange) {
            case 'binance':
                $orders = BinanceOrderbook::All();
                $whale = new WhaleBinance;

                $whale->bid_order = ($request->bidCheckbox=="on") ? 1 : 0 ;
                $whale->ask_order = ($request->askCheckbox=="on") ? 1 : 0 ;
                $whale->auto_replace = ($request->replaceCheckbox=="on") ? 1 : 0 ;
                $whale->percentage = $request->percentage;
                $whale->volume = $request->volume;
                switch ($pair) {
                    case 'btc':
                        $whale->base_rate = ($orders[0]->price+$orders[1]->price)/2;
                        $whale->coin_id = 'BTCUSDT';

                        if ($whale->bid_order==1) {
                            $whale->bid = round($whale->base_rate*(1-(($whale->percentage)/100)),2);
                            // $bid = Binance::limitBuy('BTCUSDT',$whale->volume ,$whale->bid);
                            // $whale->bid_id = $bid['orderId'];
                        } 

                        if ($whale->ask_order==1) {
                            $whale->ask = round($whale->base_rate*(1+(($whale->percentage)/100)),2);
                            // $ask = Binance::limitSell('BTCUSDT',$whale->volume ,$whale->ask);
                            // $whale->ask_id = $ask['orderId'];
                        }
                        break;
                    
                    case 'eth':
                        $whale->base_rate = ($orders[2]->price+$orders[3]->price)/2;
                        $whale->coin_id = 'ETHUSDT';

                        if ($whale->bid_order==1) {
                            $whale->bid = round($whale->base_rate*(1-(($whale->percentage)/100)),2);
                            $bid = Binance::limitBuy('ETHUSDT',$whale->volume ,$whale->bid);
                            $whale->bid_id = $bid['orderId'];
                        } 

                        if ($whale->ask_order==1) {
                            $whale->ask = round($whale->base_rate*(1+(($whale->percentage)/100)),2);
                            $ask = Binance::limitSell('ETHUSDT',$whale->volume ,$whale->ask);
                            $whale->ask_id = $ask['orderId'];
                        }
                        break;
                    
                    case 'btceth':
                        $whale->base_rate = ($orders[6]->price+$orders[7]->price)/2;
                        $whale->coin_id = 'ETHBTC';

                        if ($whale->bid_order==1) {
                            $whale->bid = round($whale->base_rate*(1-(($whale->percentage)/100)),6);
                            $bid = Binance::limitBuy('ETHBTC',$whale->volume ,$whale->bid);
                            $whale->bid_id = $bid['orderId'];
                        } 

                        if ($whale->ask_order==1) {
                            $whale->ask = round($whale->base_rate*(1+(($whale->percentage)/100)),6);
                            $ask = Binance::limitSell('ETHBTC',$whale->volume ,$whale->ask);
                            $whale->ask_id = $ask['orderId'];
                        }
                        break;
                }
                break;
            
            default:
                # code...
                break;
        }

        $whale->save();

        Session::flash('success', 'The orders were successfully placed!');
        return redirect()->route('whales.index', [$exchange,$pair]);
        
    }

    public function show($id)
    {
        $whale = WhaleBinance::find($id);
        return view('whales.show')->withWhale($whale);
    }

    public function replace($id)
    {
     
        //update the database

        $whale = WhaleBtceth::find($id);

        //Price
        $whale->base_rate = $basePrice;

        if ($whale->coin_id='ETHBTC') {
            $i = 6;
        }else{
            $i = 2;
        }

        if ($whale->bid_order==1) {
            $whale->bid = round($whale->base_rate*(1-(($whale->percentage)/100)),$i);
            Binance::cancelOrder($whale->coin_id,$whale->bid_id);
            $bid = Binance::limitBuy($whale->coin_id,$whale->volume ,$whale->bid);
            $whale->bid_id = $bid['orderId'];
        } 
        
        if ($whale->ask_order==1) {
            $whale->ask = round($whale->base_rate*(1-(($whale->percentage)/100)),$i);
            Binance::cancelOrder($whale->coin_id,$whale->ask_id);
            $ask = Binance::limitSell($whale->coin_id,$whale->volume ,$whale->ask);
            $whale->ask_id = $ask['orderId'];
        }

        $whale->save();

        Session::flash('success', 'The orders were successfully replaced!');
        return redirect()->route('whalekrakens.show', $replacewhale->id);
        
    }
}
