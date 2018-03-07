<?php namespace Hitbtc;

use Illuminate\Support\Facades\Facade;

class HitbtcAPIFacade extends Facade {

	protected static function getFacadeAccessor() {
		return 'hitbtc';
	}
}