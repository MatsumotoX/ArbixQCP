<?php

namespace App\Jobs\Bittrex;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Http\Controllers\Orderbook\BittrexController;

class BittrexGetOrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $side;
    public $coin_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($side,$coin_id)
    {
        $this->side = $side;
        $this->coin_id = $coin_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $controller = new BittrexController;

        if ($this->side==0) {
            $controller->getBid($this->coin_id);
        } else {
            $controller->getAsk($this->coin_id);
        }
        
    }
}
