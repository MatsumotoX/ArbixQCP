<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Binance\BinanceController;
use App\Http\Controllers\Kraken\KrakenController;

class ArBotController extends Controller
{

    public function __construct(){

        
    }
    public function getOrderbook(){

        $binanceController = new BinanceController;
        $krakenController = new KrakenController;

        $a = 1;
        while ($a <= 60) {
           
            $binanceController->getBtcEthOrderbook();
            $krakenController->getBtcEthOrderbook();
            


            echo $a;
            $a++;
        }

    }
}
