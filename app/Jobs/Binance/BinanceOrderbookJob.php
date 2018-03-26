<?php

namespace App\Jobs\Binance;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Jobs\Binance\BinanceGetOrderJob;
use Carbon\Carbon;

class BinanceOrderbookJob implements ShouldQueue
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
        BinanceOrderbookJob::dispatch()->delay(Carbon::now()->addSeconds(1));
        BinanceGetOrderJob::dispatch(0,0);
        BinanceGetOrderJob::dispatch(0,1);
        BinanceGetOrderJob::dispatch(0,3);
        BinanceGetOrderJob::dispatch(1,0);
        BinanceGetOrderJob::dispatch(1,1);
        BinanceGetOrderJob::dispatch(1,3);
    }
}
