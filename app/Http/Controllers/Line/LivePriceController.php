<?php

namespace App\Http\Controllers\Line;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Line\LinePushController;
use App\Http\Controllers\Fiat\FiatProfitController;


class LivePriceController extends Controller
{
    public function test2()
    {
        $linepush = new LinePushController;
        $linepush->pushMessage('Test','Ce9a6fe46973cfed6ca6d00d6cfd4b1f9');
    }

    public function test()
    {
        $combinedAPI = new FiatProfitController;
        $apis = $combinedAPI->combineAPI();
        // $oneway = $combinedAPI->getProfit();
        

        $message ="Bitcoin Price (in USD):\r\n";

        foreach ($apis as $api){
           
            $message .= $api[0]->exchange;
            $message .= ":  ".$api[0]->ask."\r\n";
            
        }

        $message .="\r\nEthereum Price (in USD):\r\n";

        foreach ($apis as $api){
           
            $message .= $api[0]->exchange;
            $message .= ":  ".$api[1]->ask."\r\n";
            
        }

        $linepush = new LinePushController;
        $linepush->pushMessage($message,'C25cf6c120577cb6086ec575eb40cf6c6');
        // return view('fiats.index')->withOneway($oneway);

    }
}
