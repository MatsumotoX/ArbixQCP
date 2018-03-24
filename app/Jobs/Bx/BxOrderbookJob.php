<?php

namespace App\Jobs\Bx;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Jobs\Bx\BxGetOrderJob;
use Carbon\Carbon;

class BxOrderbookJob implements ShouldQueue
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
        BxOrderbookJob::dispatch()->delay(Carbon::now()->addSeconds(15));
        BxGetOrderJob::dispatch(0,0);
        BxGetOrderJob::dispatch(0,1);
        BxGetOrderJob::dispatch(0,2);
        BxGetOrderJob::dispatch(0,3);
        BxGetOrderJob::dispatch(1,0);
        BxGetOrderJob::dispatch(1,1);
        BxGetOrderJob::dispatch(1,2);
        BxGetOrderJob::dispatch(1,3);
    }
}
