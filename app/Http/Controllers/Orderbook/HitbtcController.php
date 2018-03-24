<?php

namespace App\Http\Controllers\Orderbook;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Orderbook\Hitbtc\HitbtcBtc;
use App\Orderbook\Hitbtc\HitbtcEth;
use App\Orderbook\Hitbtc\HitbtcBtcEth;
use App\Orderbook\Hitbtc\HitbtcXrp;
use App\Orderbook\Hitbtc\HitbtcOrderbook;

use App\Jobs\Hitbtc\HitbtcOrderbookJob;
class HitbtcController extends Controller
{
    public function test()
    {
        HitbtcOrderbookJob::dispatch();
        // $this->startOrder();
    }

    public function getBid($coin_id)
    {
        switch ($coin_id) {
            case '0':
                $order = HitbtcOrderbook::where('coin_id',0)->where('side',0)->first();
                $order->price = HitbtcBtc::latest()->first()->bid_0;
                break;
            
            case '1':
                $order = HitbtcOrderbook::where('coin_id',1)->where('side',0)->first();
                $order->price = HitbtcEth::latest()->first()->bid_0;
                break;

            case '2':
                $order = HitbtcOrderbook::where('coin_id',2)->where('side',0)->first();
                $order->price = HitbtcXrp::latest()->first()->bid_0;
                break;

            case '3':
                $order = HitbtcOrderbook::where('coin_id',3)->where('side',0)->first();
                $order->price = HitbtcBtcEth::latest()->first()->bid_0;
                break;
        }
        $order->save();
    }

    public function getAsk($coin_id)
    {
        switch ($coin_id) {
            case '0':
                $order = HitbtcOrderbook::where('coin_id',0)->where('side',1)->first();
                $order->price = HitbtcBtc::latest()->first()->ask_0;
                break;
            
            case '1':
                $order = HitbtcOrderbook::where('coin_id',1)->where('side',1)->first();
                $order->price = HitbtcEth::latest()->first()->ask_0;
                break;

            case '2':
                $order = HitbtcOrderbook::where('coin_id',2)->where('side',1)->first();
                $order->price = HitbtcXrp::latest()->first()->ask_0;
                break;

            case '3':
                $order = HitbtcOrderbook::where('coin_id',3)->where('side',1)->first();
                $order->price = HitbtcBtcEth::latest()->first()->ask_0;
                break;
        }
        $order->save();
    }

    public function startOrder()
    {
        for ($i=0; $i < 4; $i++) { 
            for ($j=0; $j < 2; $j++) { 
                    $order = new HitbtcOrderbook;
                    $order->side = $j;
                    $order->price = 0;
                    $order->coin_id = $i;
                    $order->save();
            }
        }
    }
}
