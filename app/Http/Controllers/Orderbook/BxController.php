<?php

namespace App\Http\Controllers\Orderbook;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Orderbook\Bx\BxBtc;
use App\Orderbook\Bx\BxEth;
use App\Orderbook\Bx\BxBtcEth;
use App\Orderbook\Bx\BxXrp;
use App\Orderbook\Bx\BxOrderbook;

use App\Jobs\Bx\BxOrderbookJob;
class BxController extends Controller
{
    public function test()
    {
        BxOrderbookJob::dispatch();
        // $this->startOrder();
    }

    public function getBid($coin_id)
    {
        switch ($coin_id) {
            case '0':
                $order = BxOrderbook::where('coin_id',0)->where('side',0)->first();
                $order->price = BxBtc::latest()->first()->bid_0;
                break;
            
            case '1':
                $order = BxOrderbook::where('coin_id',1)->where('side',0)->first();
                $order->price = BxEth::latest()->first()->bid_0;
                break;

            case '2':
                $order = BxOrderbook::where('coin_id',2)->where('side',0)->first();
                $order->price = BxXrp::latest()->first()->bid_0;
                break;

            case '3':
                $order = BxOrderbook::where('coin_id',3)->where('side',0)->first();
                $order->price = BxBtcEth::latest()->first()->bid_0;
                break;
        }
        $order->save();
    }

    public function getAsk($coin_id)
    {
        switch ($coin_id) {
            case '0':
                $order = BxOrderbook::where('coin_id',0)->where('side',1)->first();
                $order->price = BxBtc::latest()->first()->ask_0;
                break;
            
            case '1':
                $order = BxOrderbook::where('coin_id',1)->where('side',1)->first();
                $order->price = BxEth::latest()->first()->ask_0;
                break;

            case '2':
                $order = BxOrderbook::where('coin_id',2)->where('side',1)->first();
                $order->price = BxXrp::latest()->first()->ask_0;
                break;

            case '3':
                $order = BxOrderbook::where('coin_id',3)->where('side',1)->first();
                $order->price = BxBtcEth::latest()->first()->ask_0;
                break;
        }
        $order->save();
    }

    public function startOrder()
    {
        for ($i=0; $i < 4; $i++) { 
            for ($j=0; $j < 2; $j++) { 
                    $order = new BxOrderbook;
                    $order->side = $j;
                    $order->price = 0;
                    $order->coin_id = $i;
                    $order->save();
            }
        }
    }
}
