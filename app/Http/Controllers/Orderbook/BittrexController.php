<?php

namespace App\Http\Controllers\Orderbook;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Orderbook\Bittrex\BittrexBtc;
use App\Orderbook\Bittrex\BittrexEth;
use App\Orderbook\Bittrex\BittrexBtcEth;
use App\Orderbook\Bittrex\BittrexXrp;
use App\Orderbook\Bittrex\BittrexOrderbook;

use App\Jobs\Bittrex\BittrexOrderbookJob;
class BittrexController extends Controller
{
    public function test()
    {
        BittrexOrderbookJob::dispatch();
        // $this->startOrder();
    }

    public function getBid($coin_id)
    {
        switch ($coin_id) {
            case '0':
                $order = BittrexOrderbook::where('coin_id',0)->where('side',0)->first();
                $order->price = BittrexBtc::latest()->first()->bid_0;
                break;
            
            case '1':
                $order = BittrexOrderbook::where('coin_id',1)->where('side',0)->first();
                $order->price = BittrexEth::latest()->select('bid_0')->first()->bid_0;
                break;

            case '2':
                $order = BittrexOrderbook::where('coin_id',2)->where('side',0)->first();
                $order->price = BittrexXrp::latest()->first()->bid_0;
                break;

            case '3':
                $order = BittrexOrderbook::where('coin_id',3)->where('side',0)->first();
                $order->price = BittrexBtcEth::latest()->first()->bid_0;
                break;
        }
        $order->save();
    }

    public function getAsk($coin_id)
    {
        switch ($coin_id) {
            case '0':
                $order = BittrexOrderbook::where('coin_id',0)->where('side',1)->first();
                $order->price = BittrexBtc::latest()->first()->ask_0;
                break;
            
            case '1':
                $order = BittrexOrderbook::where('coin_id',1)->where('side',1)->first();
                $order->price = BittrexEth::latest()->first()->ask_0;
                break;

            case '2':
                $order = BittrexOrderbook::where('coin_id',2)->where('side',1)->first();
                $order->price = BittrexXrp::latest()->first()->ask_0;
                break;

            case '3':
                $order = BittrexOrderbook::where('coin_id',3)->where('side',1)->first();
                $order->price = BittrexBtcEth::latest()->first()->ask_0;
                break;
        }
        $order->save();
    }

    public function startOrder()
    {
        for ($i=0; $i < 4; $i++) { 
            for ($j=0; $j < 2; $j++) { 
                    $order = new BittrexOrderbook;
                    $order->side = $j;
                    $order->price = 0;
                    $order->coin_id = $i;
                    $order->save();
            }
        }
    }
}
