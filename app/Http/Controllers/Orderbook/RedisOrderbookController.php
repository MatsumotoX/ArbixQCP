<?php

namespace App\Http\Controllers\Orderbook;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

use App\Events\Liveprice\UpdateLivePrice;

class RedisOrderbookController extends Controller
{
    public function getBook()
    {
        $orderbooks= array();
        for ($i = 0; $i < 7 ; $i++) { 
            for ($j = 0; $j < 4 ; $j++) { 
                $orderbooks[$i][$j][0] = json_decode(Redis::get(''.$i.".".$j))[0];
                $orderbooks[$i][$j][1] = json_decode(Redis::get(''.$i.".".$j))[1];
                $orderbooks[$i]['exchange'] = Redis::get(''.$i.".e");
            }
        }
        $json = json_encode($orderbooks);
        event(new UpdateLivePrice($json));
    }
}
