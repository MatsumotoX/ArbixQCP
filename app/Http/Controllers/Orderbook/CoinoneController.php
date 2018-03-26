<?php

namespace App\Http\Controllers\Orderbook;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Orderbook\Coinone\CoinoneBtc;
use App\Orderbook\Coinone\CoinoneEth;
use App\Orderbook\Coinone\CoinoneXrp;
use App\Orderbook\Coinone\CoinoneOrderbook;

use App\Jobs\Coinone\CoinoneOrderbookJob;
class CoinoneController extends Controller
{
    public function test()
    {
        CoinoneOrderbookJob::dispatch();
        // $this->startOrder();
    }

    public function getBid($coin_id)
    {
        switch ($coin_id) {
            case '0':
                $order = CoinoneOrderbook::where('coin_id',0)->where('side',0)->first();
                $order->price = CoinoneBtc::latest()->first()->bid_0;
                break;
            
            case '1':
                $order = CoinoneOrderbook::where('coin_id',1)->where('side',0)->first();
                $order->price = CoinoneEth::latest()->first()->bid_0;
                break;

            case '2':
                $order = CoinoneOrderbook::where('coin_id',2)->where('side',0)->first();
                $order->price = CoinoneXrp::latest()->first()->bid_0;
                break;

        }
        $order->save();
    }

    public function getAsk($coin_id)
    {
        switch ($coin_id) {
            case '0':
                $order = CoinoneOrderbook::where('coin_id',0)->where('side',1)->first();
                $order->price = CoinoneBtc::latest()->first()->ask_0;
                break;
            
            case '1':
                $order = CoinoneOrderbook::where('coin_id',1)->where('side',1)->first();
                $order->price = CoinoneEth::latest()->first()->ask_0;
                break;

            case '2':
                $order = CoinoneOrderbook::where('coin_id',2)->where('side',1)->first();
                $order->price = CoinoneXrp::latest()->first()->ask_0;
                break;

        }
        $order->save();
    }

    public function startOrder()
    {
        for ($i=0; $i < 4; $i++) { 
            for ($j=0; $j < 2; $j++) { 
                    $order = new CoinoneOrderbook;
                    $order->side = $j;
                    $order->price = 0;
                    $order->coin_id = $i;
                    $order->save();
            }
        }
    }
}
