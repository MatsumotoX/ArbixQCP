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

Route::resource('fees', 'FeeController');

Route::resource('lines', 'Line\LinePushController');

Route::resource('webhooks', 'WebhookController');

Route::resource('linesReply', 'Line\LineReplyController');

Route::get('binances/btceth','Binance\BinanceController@getBtcEthOrderbook');

Route::get('test','Binance\BinanceController@getBtcEthOrderbook');