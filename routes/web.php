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
Route::get('/welcome', 'PageController@getWelcome');
Route::resource('fees', 'Fee\FeeController');

/*
|--------------------------------------------------------------------------
| Fund Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('funds', 'Fund\FundController');


/*
|--------------------------------------------------------------------------
| Signal Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('signals', 'Signal\SignalController');
Route::resource('signalsetups', 'Signal\SignalSetupController');


    //|--------------------------------------------------------------------------
    //| Kraken Binance Routes
    //|--------------------------------------------------------------------------
    Route::get('signals/krakenbinance/{signal}/push', 'Signal\KrakenBinanceSignalController@btcethPush')->name('signalskrakenbinance.push');


// Route::resource('webhooks', 'WebhookController');

Route::resource('linesReply', 'Line\LineReplyController');

/*
|--------------------------------------------------------------------------
| whalekrakens Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('whalekrakens/replaceall', 'Whale\KrakenWhaleController@replaceAll')->name('whalekrakens.replaceall');
Route::get('whalekrakens/cancelall', 'Whale\KrakenWhaleController@cancelAll')->name('whalekrakens.cancelall');
Route::get('whalekrakens/{whalekraken}/cancel', 'Whale\KrakenWhaleController@cancel')->name('whalekrakens.cancel');
Route::get('whalekrakens/{whalekraken}/replace', 'Whale\KrakenWhaleController@replace')->name('whalekrakens.replace');
Route::resource('whalekrakens', 'Whale\KrakenWhaleController');

Route::get('whalebinances/replaceall', 'Whale\BinanceWhaleController@replaceAll')->name('whalebinances.replaceall');
Route::get('whalebinances/cancelall', 'Whale\BinanceWhaleController@cancelAll')->name('whalebinances.cancelall');
Route::get('whalebinances/{whalekraken}/cancel', 'Whale\BinanceWhaleController@cancel')->name('whalebinances.cancel');
Route::get('whalebinances/{whalekraken}/replace', 'Whale\BinanceWhaleController@replace')->name('whalebinances.replace');
Route::resource('whalebinances', 'Whale\BinanceWhaleController');


/*
|--------------------------------------------------------------------------
| BinanceAPI Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('ticker','Binance\BinanceArbiController@getTicker');
Route::get('buy','Binance\BinanceArbiController@limitBuy');

/*
|--------------------------------------------------------------------------
| BinanceAPI Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('kticker','Kraken\KrakenArbiController@getTickerBtcEth');
Route::get('korder','Kraken\KrakenArbiController@getOrderBtcEth');

/*
|--------------------------------------------------------------------------
| Fiat Price Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('fiats','Fiat\FiatPriceController');


/*
|--------------------------------------------------------------------------
| Test Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/test', 'BlackPanther\ProfitController@Test');
