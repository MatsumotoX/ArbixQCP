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

class LivePriceController extends Controller
{
    public function compileOrder()
    {
        $orderbooks[0] = BinanceOrderbook::all();
        $orderbooks[1] = BittrexOrderbook::all();
        $orderbooks[2] = BxOrderbook::all();
        $orderbooks[3] = CoinoneOrderbook::all();
        $orderbooks[4] = HitbtcOrderbook::all();
        $orderbooks[5] = KrakenOrderbook::all();
        $orderbooks[6] = QuoinexOrderbook::all();

        dd($orderbooks);
    }
    
}
