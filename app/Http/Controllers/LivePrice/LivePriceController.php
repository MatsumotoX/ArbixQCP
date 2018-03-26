<?php

namespace App\Http\Controllers\LivePrice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Orderbook\Binance\BinanceOrderbook;
use App\Orderbook\Bittrex\BittrexOrderbook;
use App\Orderbook\Bx\BxOrderbook;
use App\Orderbook\Coinone\CoinoneOrderbook;
use App\Orderbook\Hitbtc\HitbtcOrderbook;
use App\Orderbook\Kraken\KrakenOrderbook;
use App\Orderbook\Quoinex\QuoinexOrderbook;

use App\Events\Liveprice\UpdateLivePrice;

class LivePriceController extends Controller
{
    public function compileOrder()
    {

        return view('liveprices.index');

    }

    public function updatePrice()
    {
        
        $orderbooks[0] = BinanceOrderbook::all();
        $orderbooks[1] = BittrexOrderbook::all();
        $orderbooks[2] = BxOrderbook::all();
        $orderbooks[3] = CoinoneOrderbook::all();
        $orderbooks[4] = HitbtcOrderbook::all();
        $orderbooks[5] = KrakenOrderbook::all();
        $orderbooks[6] = QuoinexOrderbook::all();

        $orderbooks[0]['exchange'] = 'Binance';
        $orderbooks[1]['exchange'] = 'Bittrex';
        $orderbooks[2]['exchange'] = 'Bx';
        $orderbooks[3]['exchange'] = 'Coinone';
        $orderbooks[4]['exchange'] = 'Hitbtc';
        $orderbooks[5]['exchange'] = 'Kraken';
        $orderbooks[6]['exchange'] = 'Quoinex';

        $json = json_encode($orderbooks);
        event(new UpdateLivePrice($json));
        
    }
    
}
