<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redis;


class testController extends Controller
{
    public function test()
    {
        $orderbook= array();
        for ($i = 0; $i < 7 ; $i++) { 
            for ($j = 0; $j < 4 ; $j++) { 
                $orderbook[$i][$j][0] = json_decode(Redis::get(''.$i.".".$j))[0];
                $orderbook[$i][$j][1] = json_decode(Redis::get(''.$i.".".$j))[1];
            }
        }
        return $orderbook;
    }
}
