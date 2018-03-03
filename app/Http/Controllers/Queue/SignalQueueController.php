<?php

namespace App\Http\Controllers\Queue;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Line\LinePushController;

use Carbon\Carbon;


use App\Jobs\ProcessSignal;

class SignalQueueController extends Controller
{
    public function testQueue()
    {

            ProcessSignal::dispatch("Test queue function no: ");

        
    }

    public function testFunction()
    {
        $signal = new LinePushController;
        $signal->pushMessage('yo','C0b299a7b336d23312f04ac25c66aa253');
    }
}
