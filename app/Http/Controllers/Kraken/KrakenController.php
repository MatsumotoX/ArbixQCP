<?php

namespace App\Http\Controllers\Kraken;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KrakenBtcEth;
use Session;

class KrakenController extends Controller
{
    public function saveOrderbook() {
        $interval = 1;
        for ($i = 0; $i < ceil(60/$interval); $i++){ 
            $this->getBtcEthOrderbook();
            sleep($interval);
        }
    }

    public function getSingleBtcEthOrderbook() {

        $json = file_get_contents('https://api.kraken.com/0/public/Depth?pair=ETHXBT&count=1');
        $data = json_decode($json);

        $orderbook = array();

            $orderbook['bid'] = $data->result->XETHXXBT->bids[0][0];
            $orderbook['ask'] = $data->result->XETHXXBT->asks[0][0];

        Session::flash('krakenSingleBtcEthOrderbook', $orderbook);

    }

    public function getBtcEthOrderbook(){
        $bookcollect = getenv('NUMBER_OF_ORDER-COLLECTED') ?: '';

        $json = file_get_contents('https://api.kraken.com/0/public/Depth?pair=ETHXBT&count=30');
        $data = json_decode($json);

        $orderbook = array();

            //first order
            $orderbook['bid_1'] = $data->result->XETHXXBT->bids[0][0];
            $orderbook['v_bid_1'] = $data->result->XETHXXBT->bids[0][1];
            $orderbook['vt_bid_1'] = $orderbook['v_bid_1'];
            $orderbook['ask_1'] = $data->result->XETHXXBT->asks[0][0];
            $orderbook['v_ask_1'] = $data->result->XETHXXBT->asks[0][1];
            $orderbook['vt_ask_1'] = $orderbook['v_ask_1'];

            //order 2 - 30
            for ($i = 2 ; $i < $bookcollect+1 ; $i++) {
                $orderbook['bid_'.$i] = $data->result->XETHXXBT->bids[$i-1][0];
                $orderbook['v_bid_'.$i] = $data->result->XETHXXBT->bids[$i-1][1];
                $orderbook['vt_bid_'.$i] = $orderbook['vt_bid_'.($i-1)] + $orderbook['v_bid_'.$i];
                $orderbook['ask_'.$i] = $data->result->XETHXXBT->asks[$i-1][0];
                $orderbook['v_ask_'.$i] = $data->result->XETHXXBT->asks[$i-1][1];
                $orderbook['vt_ask_'.$i] = $orderbook['vt_ask_'.($i-1)] + $orderbook['v_ask_'.$i];
            }

            return $orderbook;
    }

    public function saveBtcEthOrderbook(){

        $json = file_get_contents('https://api.kraken.com/0/public/Depth?pair=ETHXBT&count=30');
        $data = json_decode($json);

            //Create new id
            $orderbook = new KrakenBtcEth();

            //first order
            $orderbook->bid_1 = $data->result->XETHXXBT->bids[0][0];
            $orderbook->v_bid_1 = $data->result->XETHXXBT->bids[0][1];
            $orderbook->vt_bid_1 = $orderbook->v_bid_1;
            $orderbook->ask_1 = $data->result->XETHXXBT->asks[0][0];
            $orderbook->v_ask_1 = $data->result->XETHXXBT->asks[0][1];
            $orderbook->vt_ask_1 = $orderbook->v_ask_1;

            //order 2 - 30
            for ($i = 2 ; $i < 31 ; $i++) {
                $orderbook->{'bid_'.$i} = $data->result->XETHXXBT->bids[$i-1][0];
                $orderbook->{'v_bid_'.$i} = $data->result->XETHXXBT->bids[$i-1][1];
                $orderbook->{'vt_bid_'.$i} = $orderbook->{'vt_bid_'.($i-1)} + $orderbook->{'v_bid_'.$i};
                $orderbook->{'ask_'.$i} = $data->result->XETHXXBT->asks[$i-1][0];
                $orderbook->{'v_ask_'.$i} = $data->result->XETHXXBT->asks[$i-1][1];
                $orderbook->{'vt_ask_'.$i} = $orderbook->{'vt_ask_'.($i-1)} + $orderbook->{'v_ask_'.$i};
            }
            
            $orderbook->save();
            return $orderbook;
            Session::flash('kraken', $orderbook);
    }
}
