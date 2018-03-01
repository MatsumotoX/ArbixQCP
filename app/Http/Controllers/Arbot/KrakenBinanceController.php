<?php

namespace App\Http\Controllers\Arbot;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Binance\BinanceController;
use App\Http\Controllers\Kraken\KrakenController;
use App\Http\Controllers\Line\LinePushController;
use Session;

class KrakenBinanceController extends Controller
{
    protected $to;

    public function __construct(){
        $this->to = 'C0b299a7b336d23312f04ac25c66aa253';
    }

    public function getProfit($type) {

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

        if ($profit['kr_buy_2']>0.2 || $profit['kr_sell_2']>0.2) {
            $linepush = new LinePushController;
            $linepush->pushMessage($message,'C25cf6c120577cb6086ec575eb40cf6c6');
        }


    }

    public function getArbi(){

        $kraken_fee_maker = getenv('FEE_KRAKEN_MAKER') ?: '';
        $kraken_fee_taker = getenv('FEE_KRAKEN_TAKER') ?: '';
        $binance_fee = getenv('FEE_BINANCE') ?: '';

        $kraken_fee_buy = 1+$kraken_fee_maker;
        $kraken_fee_sell = 1-$kraken_fee_maker;
        // $kraken_feet_buy = 1+$kraken_fee_taker;
        // $kraken_feet_sell = 1-$kraken_fee_taker;
        $binance_fee_buy = 1+$binance_fee;
        $binance_fee_sell = 1-$binance_fee;

        $price = $this->getPrice();
        
        $arbi = array();

        $arbi['kr_buy_0'] = ($price['binance_bid_e'] * $binance_fee_sell - $price['kraken_ask_e'] * $kraken_fee_buy)/$price['kraken_ask_e']*100;
        $arbi['kr_sell_0'] = ($price['kraken_bid_e'] * $kraken_fee_sell - $price['binance_ask_e'] * $binance_fee_buy)/$price['binance_ask_e']*100;
        $arbi['kr_buy_1'] = ($price['binance_bid_e'] * $binance_fee_sell - $price['kraken_bid_e'] * $kraken_fee_buy)/$price['kraken_bid_e']*100;
        $arbi['kr_sell_1'] = ($price['kraken_ask_e'] * $kraken_fee_sell - $price['binance_ask_e'] * $binance_fee_buy)/$price['binance_ask_e']*100;
        $arbi['kr_buy_2'] = ($price['binance_ask_e'] * $binance_fee_sell - $price['kraken_bid_e'] * $kraken_fee_buy)/$price['kraken_bid_e']*100;
        $arbi['kr_sell_2'] = ($price['kraken_ask_e'] * $kraken_fee_sell - $price['binance_bid_e'] * $binance_fee_buy)/$price['binance_bid_e']*100;

        // $arbi['bi_buy_0'] = ($price['kraken_bid_e'] * $kraken_feet_sell - $price['binance_ask_e'] * $binance_fee_buy)/$price['binance_ask_e']*100;
        // $arbi['bi_sell_0'] = ($price['binance_bid_e'] * $binance_fee_sell - $price['kraken_ask_e'] * $kraken_feet_buy)/$price['kraken_ask_e']*100;
        // $arbi['bi_buy_1'] = ($price['kraken_bid_e'] * $kraken_feet_sell - $price['binance_bid_e'] * $binance_fee_buy)/$price['binance_bid_e']*100;
        // $arbi['bi_sell_1'] = ($price['binance_ask_e'] * $binance_fee_sell - $price['kraken_ask_e'] * $kraken_feet_buy)/$price['kraken_ask_e']*100;
        // $arbi['bi_buy_2'] = ($price['kraken_ask_e'] * $kraken_fee_sell - $price['binance_bid_e'] * $binance_fee_buy)/$price['binance_bid_e']*100;
        // $arbi['bi_sell_2'] = ($price['binance_ask_e'] * $binance_fee_sell - $price['kraken_bid_e'] * $kraken_fee_buy)/$price['kraken_bid_e']*100;
        
        return $arbi;
    }

    public function getPrice(){

        $bookcollect = getenv('NUMBER_OF_ORDER-COLLECTED') ?: '';

        $ether = getenv('MINIMUN_ETHER') ?: '';

        $binanceController = new BinanceController;
        $krakenController = new KrakenController;

            $binance = $binanceController->getBtcEthOrderbook();
            $kraken = $krakenController->getBtcEthOrderbook();

            $price = array();
            $price['ether'] = $ether;

            $a = 1;
            while ($a <= $bookcollect) {
                if ($kraken['vt_bid_'.$a] >= $ether) {
                    $price['kraken_bid_e'] = $kraken['bid_'.$a];
                    break;
                }
                $a++;
            }

            $a = 1;
            while ($a <= $bookcollect) {
                if ($binance['vt_bid_'.$a] >= $ether) {
                    $price['binance_bid_e'] = $binance['bid_'.$a];
                    break;
                }
                $a++;
            }

            $a = 1;
            while ($a <= $bookcollect) {
                if ($kraken['vt_ask_'.$a] >= $ether) {
                    $price['kraken_ask_e'] = $kraken['ask_'.$a];
                    break;
                }
                $a++;
            }

            $a = 1;
            while ($a <= $bookcollect) {
                if ($binance['vt_ask_'.$a] >= $ether) {
                    $price['binance_ask_e'] = $binance['ask_'.$a];
                    break;
                }
                $a++;
            }
            return $price;

    }

}
