<?php

namespace App\Http\Controllers\Orderbook;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Orderbook\Binance\BinanceBtc;
use App\Orderbook\Binance\BinanceEth;
use App\Orderbook\Binance\BinanceBtcEth;
use App\Orderbook\Binance\BinanceOrderbook;

use App\Jobs\Binance\BinanceOrderbookJob;

class BinanceController extends Controller
{
    public function test()
    {
        BinanceOrderbookJob::dispatch();
    }

    public function getBid($coin_id)
    {
        switch ($coin_id) {
            case '0':
                $order = BinanceOrderbook::where('coin_id',0)->where('side',0)->first();
                $order->price = BinanceBtc::latest()->first()->bid_0;
                break;
            
            case '1':
                $order = BinanceOrderbook::where('coin_id',1)->where('side',0)->first();
                $order->price = BinanceEth::latest()->first()->bid_0;
                break;

            case '3':
                $order = BinanceOrderbook::where('coin_id',3)->where('side',0)->first();
                $order->price = BinanceBtcEth::latest()->first()->bid_0;
                break;
        }
        $order->save();
    }

    public function getAsk($coin_id)
    {
        switch ($coin_id) {
            case '0':
                $order = BinanceOrderbook::where('coin_id',0)->where('side',1)->first();
                $order->price = BinanceBtc::latest()->first()->ask_0;
                break;
            
            case '1':
                $order = BinanceOrderbook::where('coin_id',1)->where('side',1)->first();
                $order->price = BinanceEth::latest()->first()->ask_0;
                break;

            case '3':
                $order = BinanceOrderbook::where('coin_id',3)->where('side',1)->first();
                $order->price = BinanceBtcEth::latest()->first()->ask_0;
                break;
        }
        $order->save();
    }

    public function startBid($coin_id)
    {
        $order = new BinanceOrderbook;
        $order->side = 0;
        switch ($coin_id) {
            case '0':
                $order->price = BinanceBtc::latest()->first()->bid_0;
                $order->coin_id = 0;
                break;
            
            case '1':
                $order->price = BinanceEth::latest()->first()->bid_0;
                $order->coin_id = 1;
                break;

            case '3':
                $order->price = BinanceBtcEth::latest()->first()->bid_0;
                $order->coin_id = 3;
                break;
        }
    
        $order->save();
    }

    public function startAsk($coin_id)
    {
        $order = new BinanceOrderbook;
        $order->side = 1;
        switch ($coin_id) {
            case '0':
                $order->price = BinanceBtc::latest()->first()->ask_0;
                $order->coin_id = 0;
                break;
            
            case '1':
                $order->price = BinanceEth::latest()->first()->ask_0;
                $order->coin_id = 1;
                break;

            case '3':
                $order->price = BinanceBtcEth::latest()->first()->ask_0;
                $order->coin_id = 3;
                break;
        }
    
        $order->save();
    }

}
