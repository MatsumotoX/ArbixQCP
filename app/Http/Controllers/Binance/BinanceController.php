<?php

namespace App\Http\Controllers\Binance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BinanceBtcEth;
use Session;

class BinanceController extends Controller
{
    public function saveOrderbook() {
        $interval = 1;
        for ($i = 0; $i < ceil(60/$interval); $i++){ 
            $this->getBtcEthOrderbook();
            sleep($interval);
        }
    }

    public function getBtcEthOrderbook(){
        $bookcollect = getenv('NUMBER_OF_ORDER-COLLECTED') ?: '';

        $json = file_get_contents('https://api.binance.com/api/v1/depth?symbol=ETHBTC&limit=50');
        $data = json_decode($json);

        $orderbook = array();

            //first order
            $orderbook['bid_1'] = $data->bids[0][0];
            $orderbook['v_bid_1'] = $data->bids[0][1];
            $orderbook['vt_bid_1'] = $orderbook['v_bid_1'];
            $orderbook['ask_1'] = $data->asks[0][0];
            $orderbook['v_ask_1'] = $data->asks[0][1];
            $orderbook['vt_ask_1'] = $orderbook['v_bid_1'];

            //order 2 - 30
            for ($i = 2 ; $i < $bookcollect + 1 ; $i++) {
                $orderbook['bid_'.$i] = $data->bids[$i-1][0];
                $orderbook['v_bid_'.$i] = $data->bids[$i-1][1];
                $orderbook['vt_bid_'.$i] = $orderbook['vt_bid_'.($i-1)] + $orderbook['v_bid_'.$i];
                $orderbook['ask_'.$i] = $data->asks[$i-1][0];
                $orderbook['v_ask_'.$i] = $data->asks[$i-1][1];
                $orderbook['vt_ask_'.$i] = $orderbook['vt_ask_'.($i-1)] + $orderbook['v_ask_'.$i];
            }

            Session::flash('binance', $orderbook);
        
    }

    public function saveBtcEthOrderbook(){

        $json = file_get_contents('https://api.binance.com/api/v1/depth?symbol=ETHBTC&limit=1000');
        $data = json_decode($json);

            //Create new id
            $orderbook = new BinanceBtcEth();

            //first order
            $orderbook->bid_1 = $data->bids[0][0];
            $orderbook->v_bid_1 = $data->bids[0][1];
            $orderbook->vt_bid_1 = $orderbook->v_bid_1;
            $orderbook->ask_1 = $data->asks[0][0];
            $orderbook->v_ask_1 = $data->asks[0][1];
            $orderbook->vt_ask_1 = $orderbook->v_ask_1;

            //order 2 - 30
            for ($i = 2 ; $i < 31 ; $i++) {
                $orderbook->{'bid_'.$i} = $data->bids[$i-1][0];
                $orderbook->{'v_bid_'.$i} = $data->bids[$i-1][1];
                $orderbook->{'vt_bid_'.$i} = $orderbook->{'vt_bid_'.($i-1)} + $orderbook->{'v_bid_'.$i};
                $orderbook->{'ask_'.$i} = $data->asks[$i-1][0];
                $orderbook->{'v_ask_'.$i} = $data->asks[$i-1][1];
                $orderbook->{'vt_ask_'.$i} = $orderbook->{'vt_ask_'.($i-1)} + $orderbook->{'v_ask_'.$i};
            }
            
            $orderbook->save();
            Session::flash('binance', $orderbook);
        
    }


}
