<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Jobs\Binance\BinanceOrderbookJob;
use App\Jobs\Bittrex\BittrexOrderbookJob;
use App\Jobs\Bx\BxOrderbookJob;
use App\Jobs\Coinone\CoinoneOrderbookJob;
use App\Jobs\Hitbtc\HitbtcOrderbookJob;
use App\Jobs\Kraken\KrakenOrderbookJob;
use App\Jobs\Quoinex\QuoinexOrderbookJob;

class OrderbookDispatchJob implements ShouldQueue
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
        BinanceOrderbookJob::dispatch();
        BittrexOrderbookJob::dispatch();
        BxOrderbookJob::dispatch();
        CoinoneOrderbookJob::dispatch();
        HitbtcOrderbookJob::dispatch();
        KrakenOrderbookJob::dispatch();
        QuoinexOrderbookJob::dispatch();
    }
}
