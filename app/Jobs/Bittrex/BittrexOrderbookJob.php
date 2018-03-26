<?php

namespace App\Jobs\Bittrex;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Jobs\Bittrex\BittrexGetOrderJob;
use Carbon\Carbon;

class BittrexOrderbookJob implements ShouldQueue
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
        BittrexOrderbookJob::dispatch()->delay(Carbon::now()->addSeconds(3));
        BittrexGetOrderJob::dispatch(0,0);
        BittrexGetOrderJob::dispatch(0,1);
        BittrexGetOrderJob::dispatch(0,2);
        BittrexGetOrderJob::dispatch(0,3);
        BittrexGetOrderJob::dispatch(1,0);
        BittrexGetOrderJob::dispatch(1,1);
        BittrexGetOrderJob::dispatch(1,2);
        BittrexGetOrderJob::dispatch(1,3);
    }
}
