<?php

namespace App\Http\Controllers\Orderbook;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class RedisOrderbookController extends Controller
{
    public function getBook()
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
