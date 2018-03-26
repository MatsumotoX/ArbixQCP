<?php

namespace App\Http\Controllers\Orderbook;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Orderbook\Quoinex\QuoinexBtc;
use App\Orderbook\Quoinex\QuoinexEth;
use App\Orderbook\Quoinex\QuoinexBtcEth;
use App\Orderbook\Quoinex\QuoinexXrp;
use App\Orderbook\Quoinex\QuoinexOrderbook;

use App\Jobs\Quoinex\QuoinexOrderbookJob;
class QuoinexController extends Controller
{
    public function test()
    {
        QuoinexOrderbookJob::dispatch();
        // $this->startOrder();
    }

    public function getBid($coin_id)
    {
        switch ($coin_id) {
            case '0':
                $order = QuoinexOrderbook::where('coin_id',0)->where('side',0)->first();
                $order->price = QuoinexBtc::latest()->first()->bid_0;
                break;
            
            case '1':
                $order = QuoinexOrderbook::where('coin_id',1)->where('side',0)->first();
                $order->price = QuoinexEth::latest()->first()->bid_0;
                break;

            case '2':
                $order = QuoinexOrderbook::where('coin_id',2)->where('side',0)->first();
                $order->price = QuoinexXrp::latest()->first()->bid_0;
                break;

            case '3':
                $order = QuoinexOrderbook::where('coin_id',3)->where('side',0)->first();
                $order->price = QuoinexBtcEth::latest()->first()->bid_0;
                break;
        }
        $order->save();
    }

    public function getAsk($coin_id)
    {
        switch ($coin_id) {
            case '0':
                $order = QuoinexOrderbook::where('coin_id',0)->where('side',1)->first();
                $order->price = QuoinexBtc::latest()->first()->ask_0;
                break;
            
            case '1':
                $order = QuoinexOrderbook::where('coin_id',1)->where('side',1)->first();
                $order->price = QuoinexEth::latest()->first()->ask_0;
                break;

            case '2':
                $order = QuoinexOrderbook::where('coin_id',2)->where('side',1)->first();
                $order->price = QuoinexXrp::latest()->first()->ask_0;
                break;

            case '3':
                $order = QuoinexOrderbook::where('coin_id',3)->where('side',1)->first();
                $order->price = QuoinexBtcEth::latest()->first()->ask_0;
                break;
        }
        $order->save();
    }

    public function startOrder()
    {
        for ($i=0; $i < 4; $i++) { 
            for ($j=0; $j < 2; $j++) { 
                    $order = new QuoinexOrderbook;
                    $order->side = $j;
                    $order->price = 0;
                    $order->coin_id = $i;
                    $order->save();
            }
        }
    }
}
