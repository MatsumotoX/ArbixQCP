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
Route::get('/mat', 'PageController@getWelcome');

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

Route::resource('fees', 'Fee\FeeController');
Route::get('tfees/{type}', 'Fee\TransferFeeController@getIndex')->name('tfees.index');
Route::post('tfees/store/{type}', 'Fee\TransferFeeController@store')->name('tfees.store');
Route::get('tfees/fee/{fee}', 'Fee\TransferFeeController@show')->name('tfees.show');
Route::get('tfees/fee/{fee}/edit', 'Fee\TransferFeeController@edit')->name('tfees.edit');
Route::put('tfees/fee/{fee}', 'Fee\TransferFeeController@update')->name('tfees.update');
Route::delete('tfees/fee/{fee}', 'Fee\TransferFeeController@destroy')->name('tfees.destroy');


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

Route::get('whales/{exchange}/{pair}', 'Whale\WhaleController@getIndex')->name('whales.index');
Route::post('whales/{exchange}/{pair}', 'Whale\WhaleController@store')->name('whales.store');
Route::get('whales/{id}', 'Whale\WhaleController@show')->name('whales.show');


Route::get('whaletest', 'Whale\WhaleController@test');

Route::get('whales/replaceall', 'Whale\KrakenWhaleController@replaceAll')->name('whales.replaceall');
Route::get('whales/cancelall', 'Whale\KrakenWhaleController@cancelAll')->name('whales.cancelall');
Route::get('whales/{whalekraken}/cancel', 'Whale\KrakenWhaleController@cancel')->name('whales.cancel');
Route::get('whales/{whalekraken}/replace', 'Whale\KrakenWhaleController@replace')->name('whales.replace');
Route::resource('whalekrakens', 'Whale\KrakenWhaleController');


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
| Live Price Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('liveprices','LivePrice\LivePriceController@compileOrder');

/*
|--------------------------------------------------------------------------
| Oneway Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('oneways/{pair}', 'OneWay\OneWayController@getIndex')->name('oneways.index');

/*
|--------------------------------------------------------------------------
| Loop Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('loops/{pair}', 'Loops\LoopController@getIndex')->name('loops.index');

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

Route::get('testbinance', 'Binance\BinanceController@test');
Route::get('testbittrex', 'Orderbook\BittrexController@test');
Route::get('testbx', 'Orderbook\BxController@test');
Route::get('compile', 'LivePrice\LivePriceController@compileOrder');

Route::get('testredis', 'Orderbook\RedisOrderbookController@getbook');

