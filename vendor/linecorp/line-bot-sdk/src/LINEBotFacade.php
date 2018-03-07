<?php namespace LINE;

use Illuminate\Support\Facades\Facade;

class LINEBotAPIFacade extends Facade {

	protected static function getFacadeAccessor() {
		return 'line';
	}
}