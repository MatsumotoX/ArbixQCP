<?php namespace Exmo\Api\Tests;

/**
 * 
 */
use Illuminate\Support\ServiceProvider;

class ExmoAPIServiceProvider extends ServiceProvider {

	public function boot() 
	{
		$this->publishes([
			__DIR__.'/../config/exmo.php' => config_path('exmo.php')
		]);
	} // boot

	public function register() 
	{
		$this->mergeConfigFrom(__DIR__.'/../config/exmo.php', 'exmo');
		$this->app->bind('exmo', function() {
			return new ExmoAPI(config('exmo'));
		});

		

	} // register
}