<?php

namespace App\Http\Controllers\Signal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Arbot\KrakenBinanceController;
use Session;

class KrakenBinanceSignalController extends Controller
{
    public function btcethPush($type)
    {
        $arbot = new KrakenBinanceController;
        $arbot -> getProfit($type);

        Session::flash('success', 'A message was successfully sent!');
        return redirect()->route('signals.index'); 
    }
}
