<?php

namespace App\Http\Controllers\Signal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\BlackPanther\ProfitController;
use Line;
use Session;

class BlackPantherSignalController extends Controller
{

    public function signalPush($market,$exchange1,$exchange2,$pair)
    {
        $symbol1 = 'ETHBTC';
        $symbol2 = 'ETHBTC';
        $limit1 = 1;
        $limit2 = 1;

        if ($exchange1 == 'Exmo') {$symbol1 = 'ETH_BTC';}
        if ($exchange2 == 'Exmo') {$symbol2 = 'ETH_BTC';} 

        if ($exchange1 == 'Binance') {$limit1 = 5;}
        if ($exchange2 == 'Binance') {$limit2 = 5;} 

        $profitcontroller = new ProfitController;
        $profit = $profitcontroller -> getMargin($exchange1,$symbol1,$limit1,$exchange2,$symbol2,$limit2);

        switch ($market) {

            case 'market':
                $message = $exchange1.' - '.$exchange2."\r\nMarket Price (BTC-ETH)\r\nBid: ".number_format($profit['market']['buy'],5)."\r\n".
                'Ask: '.number_format($profit['market']['sell'],5);
                break;

            case 'marketlimit':
                $message = $exchange1.' - '.$exchange2."\r\nLimit->Market Price (BTC-ETH)\r\nBid: ".number_format($profit['marketlimit']['buy'],5)."\r\n".
                'Ask: '.number_format($profit['marketlimit']['sell'],5);
                break;

            case 'limit':
                $message = $exchange1.' - '.$exchange2."\r\nLimit Price (BTC-ETH)\r\nBid: ".number_format($profit['limit']['buy'],5)."\r\n".
                'Ask: '.number_format($profit['limit']['sell'],5);
                break;
            
            case 'all':
                $message = $exchange1.' - '.$exchange2."\r\nMarket Price (BTC-ETH)\r\nBid: ".number_format($profit['market']['buy'],5)."\r\n".
                'Ask: '.number_format($profit['market']['sell'],5)."\r\n\r\nLimit->Market Price (BTC-ETH)\r\nBid: ".number_format($profit['marketlimit']['buy'],5)."\r\n".
                'Ask: '.number_format($profit['marketlimit']['sell'],5)."\r\n\r\nLimit Price (BTC-ETH)\r\nBid: ".number_format($profit['limit']['buy'],5)."\r\n".
                'Ask: '.number_format($profit['limit']['sell'],5);
                break;
        }
        
 
        Line::pushMessage($message);

        Session::flash('success', 'A message was successfully sent!');
        return redirect()->route('signals.index'); 


    }

}
