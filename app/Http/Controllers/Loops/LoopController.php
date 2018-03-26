<?php

namespace App\Http\Controllers\Loops;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoopController extends Controller
{
    public function getIndex($pair)
    {
        switch ($pair) {
            case 'btceth':
                return view('loops.btceth');
                break;
            
            case 'btcxrp':
                return view('loops.btcxrp');
                break;

            case 'ethxrp':
                return view('loops.ethxrp');
                break;
        }
        
    }
}
