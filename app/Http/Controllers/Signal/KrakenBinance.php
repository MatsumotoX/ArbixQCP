<?php

namespace App\Http\Controllers\Signal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\ArbotController;
use Session;

class KrakenBinance extends Controller
{
    public function btcethPush($type)
    {
        $arbot = new ArbotController;
        $arbot -> getProfit($type);

        Session::flash('success', 'A message was successfully sent!');
        return redirect()->route('signals.index'); 
    }
}
