<?php

namespace App\Http\Controllers\Kraken;

use Illuminate\Http\Request;
use App\Http\Controllers\Kraken\KrakenAPIClient;
use App\Http\Controllers\Controller;
use Session;

class KrakenArbi extends Controller
{
    protected $key;     // API key
    protected $secret;  // API secret
    protected $url;     // API base URL
    protected $version; // API version
    protected $curl;    // curl handle
    protected $kraken;

    public function __construct() {

        $this->key = getenv('KRAKEN_API_KEY') ?: '';
        $this->secret =  getenv('KRAKEN_PRIVATE_KEY') ?: '';
    
        // set which platform to use (currently only beta is operational, live available soon)
        $this->beta = false; 
        $this->url = $this->beta ? 'https://api.beta.kraken.com' : 'https://api.kraken.com';
        $this->sslverify = $this->beta ? false : true;
        $this->version = 0;

        $this->kraken = new KrakenAPIClient($this->key, $this->secret, $this->url, $this->version, $this->sslverify);

    }
    
    public function TradeBalance() {

        $res = $this->kraken->QueryPrivate('Balance', array());
        return $res;
    }

    public function getAsset() {

        $res = $this->kraken->QueryPublic('Assets', array());
        dd($res);
    }

    public function OpenOrders() {

        $res = $this->kraken->QueryPrivate('OpenOrders', array());
        dd($res);
    }

    public function CloseOrders() {

        $res = $this->kraken->QueryPrivate('ClosedOrders', array());
        dd($res);
    }

    public function PlaceOrder() {

        $res = $this->kraken->QueryPrivate('AddOrder', array(
            'pair' => 'XETHXXBT',
            'type' => 'buy',
            'ordertype' => 'limit',
            'price' => '0.08801', 
            'volume' => '0.05',
            )
        );
        dd($res);
    }


    public function CancelOrder($txid) {

        $res = $this->kraken->QueryPrivate('CancelOrder', array(
            'txid' => $txid,
            )
        );
    }

    public function PlaceOrderWhale($pair,$type,$price,$volume) {

        $res = $this->kraken->QueryPrivate('AddOrder', array(
            'pair' => $pair,
            'type' => $type,
            'ordertype' => 'limit',
            'price' => $price, 
            'volume' => $volume,
            )
        );
        return $res;

    }
}
