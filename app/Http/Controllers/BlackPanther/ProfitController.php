<?php

namespace App\Http\Controllers\BlackPanther;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Fee\FeeController;

use Binance;
use Kraken;
use Hitbtc;
use Exmo;
use Session;

class ProfitController extends Controller
{


    public function getMargin($exchange1,$symbol1,$limit1,$exchange2,$symbol2,$limit2){

        $fees = new FeeController;
        $fee = $fees->getFees([$exchange1,$exchange2]);

        $book1 = $this->getOrder($exchange1,$symbol1,$limit1); //exchange 1
        $book2 = $this->getOrder($exchange2,$symbol2,$limit2); //exchange 2

        $bookfee1 = array();
        $bookfee1['bid']['maker'] = $book1['bid'] - $book1['bid']*$fee[0][0];
        $bookfee1['ask']['maker'] = $book1['ask'] + $book1['ask']*$fee[0][0];
        $bookfee1['bid']['taker'] = $book1['bid'] - $book1['bid']*$fee[0][1];
        $bookfee1['ask']['taker'] = $book1['ask'] + $book1['ask']*$fee[0][1];
        $bookfee2 = array();
        $bookfee2['bid']['maker'] = $book2['bid'] - $book2['bid']*$fee[1][0];
        $bookfee2['ask']['maker'] = $book2['ask'] + $book2['ask']*$fee[1][0];
        $bookfee2['bid']['taker'] = $book2['bid'] - $book2['bid']*$fee[1][1];
        $bookfee2['ask']['taker'] = $book2['ask'] + $book2['ask']*$fee[1][1];        

        $margin = array();
        $margin['market']['buy'] = ($bookfee2['bid']['taker']/$bookfee1['ask']['taker']-1)*100;
        $margin['market']['sell'] = ($bookfee1['bid']['taker']/$bookfee2['ask']['taker']-1)*100;

        $margin['marketlimit']['buy'] = ($bookfee2['bid']['taker']/$bookfee1['bid']['maker']-1)*100;
        $margin['marketlimit']['sell'] = ($bookfee1['ask']['maker']/$bookfee2['ask']['taker']-1)*100;

        $margin['limit']['buy'] = ($bookfee2['ask']['maker']/$bookfee1['bid']['maker']-1)*100;
        $margin['limit']['sell'] = ($bookfee1['ask']['maker']/$bookfee2['bid']['maker']-1)*100;

        return $margin;
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

            case 'Exmo':
                $orders = Exmo::getOrderbookLimit($symbol,$limit);
                $book = array();
                $book['bid'] = $orders->$symbol->bid[0][0];
                $book['ask'] = $orders->$symbol->ask[0][0];

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

