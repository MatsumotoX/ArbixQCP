<?php namespace LINE;

/**
 * 
 */
use Illuminate\Support\ServiceProvider;

class LINEBotServiceProvider extends ServiceProvider {

	public function boot() 
	{
		$this->publishes([
			__DIR__.'/../config/line.php' => config_path('line.php')
		]);
	} // boot

	public function register() 
	{
		$this->mergeConfigFrom(__DIR__.'/../config/line.php', 'line');
		$this->app->bind('line', function() {
			return new LINEBot(config('line'));
		});

		

	} // register
}