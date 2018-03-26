<?php

namespace App\Http\Controllers\OneWay;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OneWayController extends Controller
{
    public function getIndex($pair)
    {
        switch ($pair) {
            case 'btc':
                return view('oneways.btc');
                break;
            
            case 'eth':
                return view('oneways.eth');
                break;

            case 'xrp':
                return view('oneways.xrp');
                break;
        }
        
    }
}
