<?php

namespace App\Http\Controllers\Binance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Binance;

class BinanceArbiController extends Controller
{
    public function getTicker()
    {
        $res = Binance::getTickers();
        dd($res);
    }

    public function limitBuy()
    {
        $res = Binance::limitBuy('ETHBTC', '0.1', '0.06');
        dd($res['clientOrderId']);
    }
}
