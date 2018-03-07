<?php namespace Hitbtc;

/**
 * 
 */
use Illuminate\Support\ServiceProvider;

class HitbtcServiceProvider extends ServiceProvider {

	public function boot() 
	{
		$this->publishes([
			__DIR__.'/../config/hitbtc.php' => config_path('hitbtc.php')
		]);
	} // boot

	public function register() 
	{
		$this->mergeConfigFrom(__DIR__.'/../config/hitbtc.php', 'hitbtc');
		$this->app->bind('hitbtc', function() {
			return new HitbtcAPI(config('hitbtc'));
		});

		

	} // register
}