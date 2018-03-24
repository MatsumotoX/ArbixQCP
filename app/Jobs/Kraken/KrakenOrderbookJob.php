<?php

namespace App\Jobs\Kraken;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Jobs\Kraken\KrakenGetOrderJob;
use Carbon\Carbon;

class KrakenOrderbookJob implements ShouldQueue
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
        KrakenOrderbookJob::dispatch()->delay(Carbon::now()->addSeconds(1));
        KrakenGetOrderJob::dispatch(0,0);
        KrakenGetOrderJob::dispatch(0,1);
        KrakenGetOrderJob::dispatch(0,2);
        KrakenGetOrderJob::dispatch(0,3);
        KrakenGetOrderJob::dispatch(1,0);
        KrakenGetOrderJob::dispatch(1,1);
        KrakenGetOrderJob::dispatch(1,2);
        KrakenGetOrderJob::dispatch(1,3);
    }
}
