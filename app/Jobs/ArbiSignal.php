<?php

namespace App\Jobs;

use App\Http\Controllers\ArbotController;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ArbiSignal implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $arbotHandle = (new ArBotController())->getProfit();
        // if ($arbotHandle) {
        //     return true;
        // } else {
        //     return false;
        // }
        // if ()
    }
}
