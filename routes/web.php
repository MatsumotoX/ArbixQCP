<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PageController@getIndex');

Route::resource('fees', 'Fee\FeeController');

Route::resource('lines', 'Line\LinePushController');

// Route::resource('webhooks', 'WebhookController');

Route::resource('linesReply', 'Line\LineReplyController');

//Route for whalekrakens

Route::get('whalekrakens/replaceall', 'Whale\KrakenWhaleController@replaceAll')->name('whalekrakens.replaceall');
Route::get('whalekrakens/cancelall', 'Whale\KrakenWhaleController@cancelAll')->name('whalekrakens.cancelall');
Route::resource('whalekrakens', 'Whale\KrakenWhaleController');
Route::get('whalekrakens/{whalekraken}/cancel', 'Whale\KrakenWhaleController@cancel')->name('whalekrakens.cancel');
Route::get('whalekrakens/{whalekraken}/replace', 'Whale\KrakenWhaleController@replace')->name('whalekrakens.replace');


Route::get('binances/btceth','Binance\BinanceController@getBtcEthOrderbook');

Route::get('test','Whale\KrakenWhaleController@getBasePrice');

Route::get('testjob','ArBotController@startJob');

Route::get('add','Kraken\KrakenArbi@PlaceOrder');

Route::get('trade','Kraken\KrakenArbi@TradeBalance');

Route::get('openorders','Kraken\KrakenArbi@OpenOrders');

Route::get('cancelorder','Kraken\KrakenArbi@CancelOrder');

Route::get('closeorder','Kraken\KrakenArbi@CloseOrders');