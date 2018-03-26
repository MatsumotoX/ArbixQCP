<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;


class SetRedisExchange extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setredisexchange';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Redis::set('0.e','Binance');
        Redis::set('1.e','Bittrex');
        Redis::set('2.e','Bx');
        Redis::set('3.e','Coinone');
        Redis::set('4.e','Hitbtc');
        Redis::set('5.e','Kraken');
        Redis::set('6.e','Quoinex');
    }
}
