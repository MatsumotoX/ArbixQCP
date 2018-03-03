<?php

namespace App\Http\Controllers\Fiat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Test;

class FiatProfitController extends Controller
{

    protected $exhangeno;
    protected $coinno;
    protected $fee;
    protected $THB;
    protected $KRW;

    public function __construct()
    {
        $this->exchangeno =7;
        $this->coinno =2;
        $this->kraken_fee = getenv('FEE_KRAKEN_MAKER') ?: '';
    }


    /*
    Exchange:
        0 = Kraken
        1 = Binance
        2 = Coinone
        3 = Bitfinex
        4 = Bittrex
        5 = Bitstamp
        6 = Poloniex
        7 = BX
    Coin:
        0 = BTC/USD
        1 = ETH/USD
        2 = XRP/USD

    */

    public function getAPI($exchange,$coin)
    {
        $api = (object)[];

        switch ($exchange) {
            case 0:
                $api->exchange = 'Kraken';
                $json = file_get_contents('https://api.kraken.com/0/public/Ticker?pair=XXBTZUSD,XETHZUSD,XXRPZUSD');
                $data = json_decode($json);
                    switch ($coin) {
                        case 0:
                                $api->coin = 'BTC';
                                $api->bid = round($data->result->XXBTZUSD->b[0],2);
                                $api->ask = round($data->result->XXBTZUSD->a[0],2);
                            break;
                        case 1:
                                $api->coin = 'ETH';
                                $api->bid = round($data->result->XETHZUSD->b[0],2);
                                $api->ask = round($data->result->XETHZUSD->a[0],2);
                            break;
                        case 2:
                                $api->coin = 'XRP';
                                $api->bid = round($data->result->XXRPZUSD->b[0],4);
                                $api->ask = round($data->result->XXRPZUSD->a[0],4);
                        break;
                    }
                break;
            
            case 1:
                $api->exchange = 'Binance';
                switch ($coin) {
                    case 0: 
                        $json = file_get_contents('https://api.binance.com/api/v1/depth?symbol=BTCUSDT&limit=5');
                        $data = json_decode($json);
                            $api->coin = 'BTC';
                            $api->bid = round($data->bids[0][0],2);
                            $api->ask = round($data->asks[0][0],2);
                        break;
                    case 1: 
                        $json = file_get_contents('https://api.binance.com/api/v1/depth?symbol=ETHUSDT&limit=5');
                        $data = json_decode($json);
                            $api->coin = 'ETH';
                            $api->bid = round($data->bids[0][0],2);
                            $api->ask = round($data->asks[0][0],2);
                        break;
                    case 2:
                            $api->coin = 'XRP';
                            $api->bid = 0;
                            $api->ask = 0;
                }
                break;    
            case 2:
                $api->exchange = 'Coinone';
                switch ($coin) {
                    case 0: 
                        $json = file_get_contents('https://api.coinone.co.kr/orderbook/?currency=btc&format=json');
                        $data = json_decode($json);
                            $api->coin = 'BTC';
                            $api->bid = round($data->bid[0]->price/ $this->KRW,2);
                            $api->ask = round($data->ask[0]->price/ $this->KRW,2);
                        break;
                    case 1: 
                        $json = file_get_contents('https://api.coinone.co.kr/orderbook/?currency=eth&format=json');
                        $data = json_decode($json);
                            $api->coin = 'ETH';
                            $api->bid = round($data->bid[0]->price/ $this->KRW,2);
                            $api->ask = round($data->ask[0]->price/ $this->KRW,2);
                        break;
                    case 2: 
                        $json = file_get_contents('https://api.coinone.co.kr/orderbook/?currency=xrp&format=json');
                        $data = json_decode($json);
                            $api->coin = 'XRP';
                            $api->bid = round($data->bid[0]->price/ $this->KRW,4);
                            $api->ask = round($data->ask[0]->price/ $this->KRW,4);
                        break;
                }
                break;  
            case 3:
                $api->exchange = 'Bitfinex';
                switch ($coin) {
                    case 0: 
                        $json = file_get_contents('https://api.bitfinex.com/v1/pubticker/BTCUSD');
                        $data = json_decode($json);
                            $api->coin = 'BTC';
                            $api->bid = round($data->bid,2);
                            $api->ask = round($data->ask,2);
                        break;
                    case 1: 
                        $json = file_get_contents('https://api.bitfinex.com/v1/pubticker/ETHUSD');
                        $data = json_decode($json);
                            $api->coin = 'ETH';
                            $api->bid = round($data->bid,2);
                            $api->ask = round($data->ask,2);
                        break;
                    case 2: 
                        $json = file_get_contents('https://api.bitfinex.com/v1/pubticker/XRPUSD');
                        $data = json_decode($json);
                            $api->coin = 'XRP';
                            $api->bid = round($data->bid,4);
                            $api->ask = round($data->ask,4);
                        break;
                }
                break;
            case 4:
                $api->exchange = 'Bittrex';
                switch ($coin) {
                    case 0: 
                        $json = file_get_contents('https://bittrex.com/api/v1.1/public/getticker?market=USDT-BTC');
                        $data = json_decode($json);
                            $api->coin = 'BTC';
                            $api->bid = round($data->result->Bid,2);
                            $api->ask = round($data->result->Ask,2);
                        break;
                    case 1: 
                        $json = file_get_contents('https://bittrex.com/api/v1.1/public/getticker?market=USDT-ETH');
                        $data = json_decode($json);
                            $api->coin = 'ETH';
                            $api->bid = round($data->result->Bid,2);
                            $api->ask = round($data->result->Ask,2);
                        break;
                    case 2: 
                        $json = file_get_contents('https://bittrex.com/api/v1.1/public/getticker?market=USDT-XRP');
                        $data = json_decode($json);
                            $api->coin = 'XRP';
                            $api->bid = round($data->result->Bid,4);
                            $api->ask = round($data->result->Ask,4);
                        break;
                }
                break;
            case 5:
                $api->exchange = 'Bitstamp';
                switch ($coin) {
                    case 0: 
                        $json = file_get_contents('https://www.bitstamp.net/api/v2/ticker/btcusd');
                        $data = json_decode($json);
                            $api->coin = 'BTC';
                            $api->bid = round($data->bid,2);
                            $api->ask = round($data->ask,2);
                        break;
                    case 1: 
                        $json = file_get_contents('https://www.bitstamp.net/api/v2/ticker/ethusd');
                        $data = json_decode($json);
                            $api->coin = 'ETH';
                            $api->bid = round($data->bid,2);
                            $api->ask = round($data->ask,2);
                        break;
                    case 2: 
                        $json = file_get_contents('https://www.bitstamp.net/api/v2/ticker/xrpusd');
                        $data = json_decode($json);
                            $api->coin = 'XRP';
                            $api->bid = round($data->bid,4);
                            $api->ask = round($data->ask,4);
                        break;
                }
                break;  
            case 6:
                $api->exchange = 'Poloniex';
                switch ($coin) {
                    case 0: 
                        $json = file_get_contents('https://poloniex.com/public?command=returnOrderBook&currencyPair=USDT_BTC&depth=1');
                        $data = json_decode($json);
                            $api->coin = 'BTC';
                            $api->bid = round($data->bids[0][0],2);
                            $api->ask = round($data->asks[0][0],2);
                        break;
                    case 1: 
                        $json = file_get_contents('https://poloniex.com/public?command=returnOrderBook&currencyPair=USDT_ETH&depth=1');
                        $data = json_decode($json);
                            $api->coin = 'ETH';
                            $api->bid = round($data->bids[0][0],2);
                            $api->ask = round($data->asks[0][0],2);
                        break;
                    case 2: 
                        $json = file_get_contents('https://poloniex.com/public?command=returnOrderBook&currencyPair=USDT_XRP&depth=1');
                        $data = json_decode($json);
                            $api->coin = 'XRP';
                            $api->bid = round($data->bids[0][0],4);
                            $api->ask = round($data->asks[0][0],4);
                        break;
                }
                break;  
            case 7:
                $api->exchange = 'BX';
                $json = file_get_contents('https://bx.in.th/api/');
                $data = json_decode($json);
                    switch ($coin) {
                        case 0:
                                $api->coin = 'BTC';
                                $api->bid = round($data->{1}->orderbook->bids->highbid/$this->THB,2);
                                $api->ask = round($data->{1}->orderbook->asks->highbid/$this->THB,2);
                            break;
                        case 1:
                                $api->coin = 'ETH';
                                $api->bid = round($data->{21}->orderbook->bids->highbid/$this->THB,2);
                                $api->ask = round($data->{21}->orderbook->asks->highbid/$this->THB,2);
                            break;
                        case 2:
                                $api->coin = 'XRP';
                                $api->bid = round($data->{25}->orderbook->bids->highbid/$this->THB,4);
                                $api->ask = round($data->{25}->orderbook->asks->highbid/$this->THB,4);
                        break;
                }
                break;    
        }
        
        return $api;

    }

    public function combineAPI()
    {
        $fx = (object)[];
        $json = file_get_contents('https://api.fixer.io/latest?base=USD');
        $fxdata = json_decode($json);
            $this->THB = $fxdata->rates->THB;
            $this->KRW = $fxdata->rates->KRW;

        $api = array();
        for ($exchange=0; $exchange < $this->exchangeno+1; $exchange++) { 
            for ($coin=0; $coin < $this->coinno+1; $coin++) { 
                $api[$exchange][$coin] = $this->getAPI($exchange,$coin);
            }
        }
        // dd($api);
        return $api;
        
    }

    public function getProfit()
    {
        $api = $this->combineAPI();

        $profit = array();
        for ($exchange1=0; $exchange1 < $this->exchangeno+1; $exchange1++) { 
            for ($exchange2=0; $exchange2 < $this->exchangeno+1; $exchange2++) { 
                for ($coin=0; $coin < $this->coinno+1; $coin++) { 
                    $profit[$exchange1][$exchange2][$coin] = (object)[] ;
                    $profit[$exchange1][$exchange2][$coin]->exchange1 = $api[$exchange1][$coin]->exchange;
                    $profit[$exchange1][$exchange2][$coin]->exchange2 = $api[$exchange2][$coin]->exchange;
                    $profit[$exchange1][$exchange2][$coin]->coin = $api[$exchange1][$coin]->coin;
                    $profit[$exchange1][$exchange2][$coin]->profit = $api[$exchange2][$coin]->bid - $api[$exchange1][$coin]->ask;
                }
            }
        }
        
        return $profit;
    }

    public function shoot()
    {
        $apis = $this->combineAPI();
        return view('Arbot.index')->withApis($apis);
    }
}
