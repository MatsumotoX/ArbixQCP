<?php

namespace App\Http\Controllers\Signal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\BlackPanther\ProfitController;

use GuzzleHttp\Client as HttpClient;

class BlackPantherSignalController extends Controller
{
    public function Test()
    {
        $controller = new ProfitController;
        $controller->getOrders('Hitbtc','ETHBTC',5);
    }
    
}
