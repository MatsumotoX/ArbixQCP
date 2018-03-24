<?php

namespace App\Jobs\Coinone;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Jobs\Coinone\CoinoneGetOrderJob;
use Carbon\Carbon;

class CoinoneOrderbookJob implements ShouldQueue
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
        CoinoneOrderbookJob::dispatch()->delay(Carbon::now()->addSeconds(3));
        CoinoneGetOrderJob::dispatch(0,0);
        CoinoneGetOrderJob::dispatch(0,1);
        CoinoneGetOrderJob::dispatch(0,2);
        CoinoneGetOrderJob::dispatch(1,0);
        CoinoneGetOrderJob::dispatch(1,1);
        CoinoneGetOrderJob::dispatch(1,2);
    }
}
