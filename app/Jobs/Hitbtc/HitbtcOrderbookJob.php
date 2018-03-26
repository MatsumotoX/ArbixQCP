<?php

namespace App\Jobs\Hitbtc;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Jobs\Hitbtc\HitbtcGetOrderJob;
use Carbon\Carbon;

class HitbtcOrderbookJob implements ShouldQueue
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
        HitbtcOrderbookJob::dispatch()->delay(Carbon::now()->addSeconds(1));
        HitbtcGetOrderJob::dispatch(0,0);
        HitbtcGetOrderJob::dispatch(0,1);
        HitbtcGetOrderJob::dispatch(0,2);
        HitbtcGetOrderJob::dispatch(0,3);
        HitbtcGetOrderJob::dispatch(1,0);
        HitbtcGetOrderJob::dispatch(1,1);
        HitbtcGetOrderJob::dispatch(1,2);
        HitbtcGetOrderJob::dispatch(1,3);
    }
}
