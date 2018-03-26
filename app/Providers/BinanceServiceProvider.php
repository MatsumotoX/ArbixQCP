<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Binance\BinanceAPI;

class BinanceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() 
	{
		$this->publishes([
			'config/binance.php' => config_path('binance.php')
		]);
	} // boot

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
		$this->app->bind('binance', function() {
			return new BinanceAPI(config('binance'));
		});
    }
}
