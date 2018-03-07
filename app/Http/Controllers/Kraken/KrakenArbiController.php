<?php

namespace App\Http\Controllers\Kraken;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Kraken;
use Hitbtc;

class KrakenArbiController extends Controller
{
    public function getTickerBtcEth()
    {
        $res = Kraken::getTicker('ETHXBT');
        dd($res);
    }

    public function getOrderBtcEth()
    {
        $res = Kraken::getOrder('XETHXXBT','30');
        dd($res);
        
    }

    public function Hitbtc()
    {
        $res = Hitbtc::getOrderbookLimit('ETHBTC',1);
        dd($res);
    }
}
