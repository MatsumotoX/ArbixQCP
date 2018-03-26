<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Http\Controllers\Orderbook\BinanceController;
use App\Http\Controllers\Orderbook\BittrexController;
use App\Http\Controllers\Orderbook\BxController;
use App\Http\Controllers\Orderbook\CoinoneController;
use App\Http\Controllers\Orderbook\HitbtcController;
use App\Http\Controllers\Orderbook\KrakenController;
use App\Http\Controllers\Orderbook\QuoinexController;

class StartOrderbookCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'startorderbook';

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
        $controller = new BinanceController;
        $controller->startOrder();
        $controller = new BittrexController;
        $controller->startOrder();
        $controller = new BxController;
        $controller->startOrder();
        $controller = new CoinoneController;
        $controller->startOrder();
        $controller = new HitbtcController;
        $controller->startOrder();
        $controller = new KrakenController;
        $controller->startOrder();
        $controller = new QuoinexController;
        $controller->startOrder();
    }
}
