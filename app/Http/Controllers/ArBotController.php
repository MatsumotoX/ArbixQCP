<?php

namespace App\Http\Controllers;

use App\Jobs\ArbiSignal;
use Illuminate\Http\Request;
use App\Http\Controllers\Binance\BinanceController;
use App\Http\Controllers\Kraken\KrakenController;
use App\Http\Controllers\Line\LinePushController;
use Session;

class ArBotController extends Controller
{

    public function __construct(){

    }

    public function startJob()
    {
        $job = ($this->getProfit())->onQueue('get_profit');
        $this->dispatch($job);
        echo "Starting Job !";
    }

    public function getProfit() {

        $profit = $this->getArbi();
        $message = 'Kraken_Buy:'.number_format($profit['kr_buy_2'],8).' '.
        'Kraken_Sell:'.number_format($profit['kr_sell_2'],8);
 
        $linepush = new LinePushController;
        $linepush->pushMessage($message);

        if (!$linepush) {
            return false;
        } else {
            return true;
        }
    }

    public function getArbi(){

        $kraken_fee_maker = getenv('FEE_KRAKEN_MAKER') ?: '';
        $kraken_fee_taker = getenv('FEE_KRAKEN_TAKER') ?: '';
        $binance_fee = getenv('FEE_BINANCE') ?: '';

        $kraken_fee_buy = 1+$kraken_fee_maker;
        $kraken_fee_sell = 1-$kraken_fee_maker;
        $kraken_feet_buy = 1+$kraken_fee_taker;
        $kraken_feet_sell = 1-$kraken_fee_taker;
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

        $arbi['bi_buy_0'] = ($price['kraken_bid_e'] * $kraken_feet_sell - $price['binance_ask_e'] * $binance_fee_buy)/$price['binance_ask_e']*100;
        $arbi['bi_sell_0'] = ($price['binance_bid_e'] * $binance_fee_sell - $price['kraken_ask_e'] * $kraken_feet_buy)/$price['kraken_ask_e']*100;
        $arbi['bi_buy_1'] = ($price['kraken_bid_e'] * $kraken_feet_sell - $price['binance_bid_e'] * $binance_fee_buy)/$price['binance_bid_e']*100;
        $arbi['bi_sell_1'] = ($price['binance_ask_e'] * $binance_fee_sell - $price['kraken_ask_e'] * $kraken_feet_buy)/$price['kraken_ask_e']*100;
        $arbi['bi_buy_2'] = ($price['kraken_ask_e'] * $kraken_fee_sell - $price['binance_bid_e'] * $binance_fee_buy)/$price['binance_bid_e']*100;
        $arbi['bi_sell_2'] = ($price['binance_ask_e'] * $binance_fee_sell - $price['kraken_bid_e'] * $kraken_fee_buy)/$price['kraken_bid_e']*100;
        
        return $arbi;
    }

    public function getPrice(){

        $bookcollect = getenv('NUMBER_OF_ORDER-COLLECTED') ?: '';

        $ether = getenv('MINIMUN_ETHER') ?: '';

        $binanceController = new BinanceController;
        $krakenController = new KrakenController;

            $binanceController->getBtcEthOrderbook();
            $krakenController->getBtcEthOrderbook();
            
            $kraken = Session::get('kraken');
            $binance = Session::get('binance');

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
