<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Http\Controllers\Line\LinePushController;
use App\Jobs\ProcessSignal;
use Carbon\Carbon;

class ProcessSignal implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $message;

    public function __construct($a)
    {
        $this->message = $a;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        
        $signal = new LinePushController;
        $signal->pushMessage('kuy','C0b299a7b336d23312f04ac25c66aa253');

        ProcessSignal::dispatch()->delay(Carbon::now()->addSeconds(5));


    }
}
