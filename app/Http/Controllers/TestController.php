<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;

class TestController extends Controller
{

    protected $exhangeno;
    protected $coinno;
    protected $fee;

    public function __construct()
    {
        $this->exchangeno =2;
        $this->coinno =1;
        $this->kraken_fee = getenv('FEE_KRAKEN_MAKER') ?: '';
    }

    public function getAPI($exchange,$coin)
    {
        $api = (object)[];
        switch ($exchange) {
            case 0:
                $api->exchange = 'Kraken';
                switch ($coin) {
                    case 0:
                        $json = file_get_contents('https://api.kraken.com/0/public/Depth?pair=ETHXBT&count=1');
                        $data = json_decode($json);
                            $api->coin = 'BTC';
                            $api->bid = $data->result->XETHXXBT->bids[0][0];
                            $api->ask = $data->result->XETHXXBT->asks[0][0];
                        break;
                }
                break;
            
            case 1:
            $api->exchange = 'Binance';
                switch ($coin) {
                    case 0:
                        $json = file_get_contents('https://api.binance.com/api/v1/depth?symbol=ETHBTC&limit=5');
                        $data = json_decode($json);
                            $api->coin = 'BTC';
                            $api->bid = $data->bids[0][0];
                            $api->ask = $data->asks[0][0];
                        break;
                }
                break;
        }
        
        return $api;

    }

    public function combineAPI()
    {
        $api = array();
        for ($exchange=0; $exchange < $this->exchangeno; $exchange++) { 
            for ($coin=0; $coin < $this->coinno; $coin++) { 
                $api[$exchange][$coin] = $this->getAPI($exchange,$coin);
            }
        }
        
        return $api;
    }

    public function getProfit()
    {
        $api = $this->combineAPI();

        $profit = array();
        for ($exchange1=0; $exchange1 < $this->exchangeno; $exchange1++) { 
            for ($exchange2=0; $exchange2 < $this->exchangeno; $exchange2++) { 
                for ($coin=0; $coin < $this->coinno; $coin++) { 
                    $profit[$exchange1][$exchange2][$coin] = (object)[] ;
                    $profit[$exchange1][$exchange2][$coin]->exchange1 = $api[$exchange1][$coin]->exchange;
                    $profit[$exchange1][$exchange2][$coin]->exchange2 = $api[$exchange2][$coin]->exchange;
                    $profit[$exchange1][$exchange2][$coin]->coin = $api[$exchange2][$coin]->coin;
                    $profit[$exchange1][$exchange2][$coin]->profit = $api[$exchange1][$coin]->bid-$api[$exchange2][$coin]->ask ;
                }
            }
        }
        dd($profit);
    }

    public function shoot()
    {
        $apis = $this->combineAPI();
        return view('Arbot.index')->withApis($apis);
    }
}
