<?php

namespace App\Http\Controllers\Orderbook;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Orderbook\Kraken\KrakenBtc;
use App\Orderbook\Kraken\KrakenEth;
use App\Orderbook\Kraken\KrakenBtcEth;
use App\Orderbook\Kraken\KrakenXrp;
use App\Orderbook\Kraken\KrakenOrderbook;

use App\Jobs\Kraken\KrakenOrderbookJob;
class KrakenController extends Controller
{
    public function test()
    {
        KrakenOrderbookJob::dispatch();
        // $this->startOrder();
    }

    public function getBid($coin_id)
    {
        switch ($coin_id) {
            case '0':
                $order = KrakenOrderbook::where('coin_id',0)->where('side',0)->first();
                $order->price = KrakenBtc::latest()->first()->bid_0;
                break;
            
            case '1':
                $order = KrakenOrderbook::where('coin_id',1)->where('side',0)->first();
                $order->price = KrakenEth::latest()->first()->bid_0;
                break;

            case '2':
                $order = KrakenOrderbook::where('coin_id',2)->where('side',0)->first();
                $order->price = KrakenXrp::latest()->first()->bid_0;
                break;

            case '3':
                $order = KrakenOrderbook::where('coin_id',3)->where('side',0)->first();
                $order->price = KrakenBtcEth::latest()->first()->bid_0;
                break;
        }
        $order->save();
    }

    public function getAsk($coin_id)
    {
        switch ($coin_id) {
            case '0':
                $order = KrakenOrderbook::where('coin_id',0)->where('side',1)->first();
                $order->price = KrakenBtc::latest()->first()->ask_0;
                break;
            
            case '1':
                $order = KrakenOrderbook::where('coin_id',1)->where('side',1)->first();
                $order->price = KrakenEth::latest()->first()->ask_0;
                break;

            case '2':
                $order = KrakenOrderbook::where('coin_id',2)->where('side',1)->first();
                $order->price = KrakenXrp::latest()->first()->ask_0;
                break;

            case '3':
                $order = KrakenOrderbook::where('coin_id',3)->where('side',1)->first();
                $order->price = KrakenBtcEth::latest()->first()->ask_0;
                break;
        }
        $order->save();
    }

    public function startOrder()
    {
        for ($i=0; $i < 4; $i++) { 
            for ($j=0; $j < 2; $j++) { 
                    $order = new KrakenOrderbook;
                    $order->side = $j;
                    $order->price = 0;
                    $order->coin_id = $i;
                    $order->save();
            }
        }
    }
}
