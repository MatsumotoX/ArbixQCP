<?php

namespace App\Http\Controllers\Kraken;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Kraken;

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
}
