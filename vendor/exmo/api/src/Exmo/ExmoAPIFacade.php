<?php namespace Exmo\Api\Tests;

use Illuminate\Support\Facades\Facade;

class ExmoAPIFacade extends Facade {

	protected static function getFacadeAccessor() {
		return 'exmo';
	}
}