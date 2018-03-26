<?php

namespace App\Jobs\Quoinex;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Jobs\Quoinex\QuoinexGetOrderJob;
use Carbon\Carbon;

class QuoinexOrderbookJob implements ShouldQueue
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
        QuoinexOrderbookJob::dispatch()->delay(Carbon::now()->addSeconds(2));
        QuoinexGetOrderJob::dispatch(0,0);
        QuoinexGetOrderJob::dispatch(0,1);
        QuoinexGetOrderJob::dispatch(0,2);
        QuoinexGetOrderJob::dispatch(0,3);
        QuoinexGetOrderJob::dispatch(1,0);
        QuoinexGetOrderJob::dispatch(1,1);
        QuoinexGetOrderJob::dispatch(1,2);
        QuoinexGetOrderJob::dispatch(1,3);
    }
}
