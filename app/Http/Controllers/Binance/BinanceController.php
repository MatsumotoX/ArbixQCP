<?php

namespace App\Http\Controllers\Binance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Binance;

class BinanceController extends Controller
{
    public function test()
    {
        $test = Binance::limitSell('NEOUSDT', 1, 90);
        dd($test['orderId']);
    }
}
