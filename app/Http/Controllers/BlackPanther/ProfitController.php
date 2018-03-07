<?php

namespace App\Http\Controllers\BlackPanther;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Binance;
use Kraken;
use Hitbtc;
use Session;

class ProfitController extends Controller
{
    public function test()
    {
        $this->getMargin('Binance','ETHBTC',5,'Hitbtc','ETHBTC',1);
    }
    public function getProfitx($type) {

        $profit = $this->getArbi();
        switch ($type) {

            case 'market':
                $message = "Kraken - Binance\r\nMarket Price (BTC-ETH)\r\nBid: ".number_format($profit['kr_buy_0'],5)."\r\n".
                'Ask: '.number_format($profit['kr_sell_0'],5);
                break;

            case 'marketlimit':
                $message = "Kraken - Binance\r\nLimit->Market Price (BTC-ETH)\r\nBid: ".number_format($profit['kr_buy_1'],5)."\r\n".
                'Ask: '.number_format($profit['kr_sell_1'],5);
                break;

            case 'limit':
                $message = "Kraken - Binance\r\nLimit Price (BTC-ETH)\r\nBid: ".number_format($profit['kr_buy_2'],5)."\r\n".
                'Ask: '.number_format($profit['kr_sell_2'],5);
                break;
            
            case 'all':
                $message = "Kraken - Binance\r\nMarket Price (BTC-ETH)\r\nBid: ".number_format($profit['kr_buy_0'],5)."\r\n".
                'Ask: '.number_format($profit['kr_sell_0'],5)."\r\n\r\nLimit->Market Price (BTC-ETH)\r\nBid: ".number_format($profit['kr_buy_1'],5)."\r\n".
                'Ask: '.number_format($profit['kr_sell_1'],5)."\r\n\r\nLimit Price (BTC-ETH)\r\nBid: ".number_format($profit['kr_buy_2'],5)."\r\n".
                'Ask: '.number_format($profit['kr_sell_2'],5);
                break;
        }
        
 
        $linepush = new LinePushController;
        $linepush->pushMessage($message,$this->to);
    
        $signallimit = getenv('SIGNAL_LIMIT') ?: '';

        if ($profit['kr_buy_2']>$signallimit || $profit['kr_sell_2']>$signallimit) {
            $linepush = new LinePushController;
            $linepush->pushMessage($message,'C0b299a7b336d23312f04ac25c66aa253');
        }


    }

    public function getFee($exchange1,$exchange2)
    {
        $fees = array();
        $fees[0] = 0.0004;
        $fees[1] = -0.0001;
        return $fees;
    }

    public function getMargin($exchange1,$symbol1,$limit1,$exchange2,$symbol2,$limit2){

        $fees = $this->getFee($exchange1,$exchange2);
        $book1 = $this->getOrder($exchange1,$symbol1,$limit1); //exchange 1
        $book2 = $this->getOrder($exchange2,$symbol2,$limit2); //exchange 2

        $bookfee1 = array();
        $bookfee1['bid'] = $book1['bid'] + $book1['bid']*$fees[0];
        $bookfee1['ask'] = $book1['ask'] - $book1['ask']*$fees[0];
        $bookfee2 = array();
        $bookfee2['bid'] = $book2['bid'] + $book2['bid']*$fees[1];
        $bookfee2['ask'] = $book2['ask'] - $book2['ask']*$fees[1];

        $margin = array();
        $margin['market']['buy'] = ($bookfee2['bid']/$bookfee1['ask']-1)*100;
        $margin['market']['sell'] = ($bookfee1['bid']/$bookfee2['ask']-1)*100;

        $margin['marketlimit']['buy'] = ($bookfee2['bid']/$bookfee1['bid']-1)*100;
        $margin['marketlimit']['sell'] = ($bookfee1['ask']/$bookfee2['ask']-1)*100;

        $margin['limit']['buy'] = ($bookfee2['ask']/$bookfee1['bid']-1)*100;
        $margin['limit']['sell'] = ($bookfee1['ask']/$bookfee2['bid']-1)*100;
        dd($margin);
        
        return $arbi;
    }

    public function getOrder($exchange,$symbol,$limit)
    {
        switch ($exchange) {
            case 'Binance':
                $orders = Binance::getOrderBooks($symbol,$limit);
                $book = array();
                $book['bid'] = $orders['bids'][0][0];
                $book['ask'] = $orders['asks'][0][0];

                return $book;
                break;
            
            case 'Hitbtc':
                $orders = Hitbtc::getOrderbookLimit($symbol,$limit);
                $book = array();
                $book['bid'] = $orders['bid'][0]['price'];
                $book['ask'] = $orders['ask'][0]['price'];

                return $book;
                break;
        }
    }

    public function getOrders($exchange,$symbol,$limit)
    {
        switch ($exchange) {
            case 'Binance':
                $orders = Binance::getOrderBooks($symbol,$limit);
                $book = array();
                $count = 0;
                foreach ($orders['bids'] as $order) {
                    $book[$count]['bid'] = $order[0];
                    $count++;
                }
                $count = 0;
                foreach ($orders['asks'] as $order) {
                    $book[$count]['ask'] = $order[0];
                    $count++;
                }
                return $book;
                break;
            
            case 'Hitbtc':
                $orders = Hitbtc::getOrderbookLimit($symbol,$limit);
                $book = array();
                $count = 0;
                // dd($orders);
                foreach ($orders['bid'] as $order) {
                    $book[$count]['bid'] = $order['price'];
                    $count++;
                }
                $count = 0;
                foreach ($orders['ask'] as $order) {
                    $book[$count]['ask'] = $order['price'];
                    $count++;
                }
                return $book;
                break;
        }
    }
}

