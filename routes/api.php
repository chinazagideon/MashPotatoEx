<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => "coins"], function () {
    Route::get('/list', 'ParseJsonResponseController@getSupportedCoinJQ');
    Route::get('/v/list', 'CoinsController@listCoinResource');
    Route::get('/info/single/{slug}', "CoinsController@getCoinJson");

});
Route::get('coins/info/{limit}', 'ParseJsonResponseController@getCoinsInfoJQ');
Route::get('coin/{id}', 'ParseJsonResponseController@getCoinInfoJQ');
Route::get('coin/ticker', 'ParseJsonResponseController@ticker');
Route::get('user/{id}/balance/fiat', 'ParseJsonResponseController@userFiatBalance'); //get fiat wallet balance sum of all supported coin
Route::get('user/{id}/balances/fiat', 'ParseJsonResponseController@userAllFiatBalance'); //get wallet balances for all coins individually
Route::get('user/{id}/transactions', 'ParseJsonResponseController@getUserTransactions');
Route::post('swap/', 'ParseJsonResponseController@swapCoin');
Route::get('coin/balance/{user}/{coin}', 'ParseJsonResponseController@getSingleCoinBalance');
Route::get('borrow/calc', 'ParseJsonResponseController@coinBorrowCalc');
Route::get('staking/calc', 'ParseJsonResponseController@calcStaking');
Route::post('wallet/backup/validate', 'ParseJsonResponseController@backupValidate');
Route::post('deposit/address', 'ParseJsonResponseController@depositAddress');
Route::post('send', 'ParseJsonResponseController@transferCoinData');
Route::post('cart/', 'OrderProductController@addToCart')->name('add_to_cart');

Route::get('coin/stake/others', 'ParseJsonResponseController@getOtherStakingCoins');
Route::get('coin/widget/{slug}', 'ParseJsonResponseController@getPriceWidget');
Route::get('token/balances/{user}', 'ParseJsonResponseController@getTokenBalances');
Route::get('other/coins/list', 'ParseJsonResponseController@otherCoins');
Route::get('deposit/token/address/{coin}/{user}', 'ParseJsonResponseController@tokenDepositAddress');
Route::post('token/withdrawal/', 'ParseJsonResponseController@calcTokenWithdrawal');

Route::get('presale/{slug}', 'ParseJsonResponseController@getPreSaleData');
Route::get('validate/balance/{coin_slug}/{fiat}/{user}', 'ParseJsonResponseController@compareUserBalanceCryptoToFiat');
Route::get('mining/edit/{id}', 'ParseJsonResponseController@getMiningItem');
Route::post('rec/save', 'ParseJsonResponseController@saveReceiverData');

Route::group(['prefix' => 'tickers'], function () {
    Route::get('/{pair}', 'ApiController@getTickers');
    Route::get('/market/call', 'ApiController@market');
    Route::get('/market/{limit}', 'MarketController@getMarketResource');
    Route::get('/symbol/{symbol}', 'MarketController@getLastPrice');


//new dashboard routes
    Route::get('/prices/{limit}', "CoinInfoController@getCoinInfoTickerResource");
});
Route::get('ticker/{pair}/{type}', "ApiController@tickerJson");
Route::post('/transaction/auth/{user}', "ParseJsonResponseController@authenticateTransaction");
Route::post('/verify/otp/{user}/{otp}', "ParseJsonResponseController@verifyOtp");
Route::post('/verify/otp/{user}', "ParseJsonResponseController@verifyOtp");
Route::get('/orders/traded/{usr}', 'TraderController@getRecentOrders');


//payment
Route::any('/make/payment', 'PaymentController@makePaymentTesting');
Route::get('/coins/active', 'CoinsController@allowedCoins');
Route::any('/callback', 'PaymentController@processCallBack');
Route::get('/mrkt/data/{pair}', "TraderController@tradeSideType");
Route::get('/mrk/exchange/{type}/{user}', 'TraderController@exchangeManager');
Route::group(['prefix' => 'trade'], function () {
    Route::get('balance/{user}', 'ParseJsonResponseController@getUserTradeBalance');
    Route::get('order/{refcode}', "TraderController@getOrder");
    Route::get('orders/{user}', 'TraderController@getTradeOrders');
});


Route::get('refresh_captcha', 'HomeController@refreshCaptcha')->name('refresh_captcha');
Route::group(['prefix' => 'payment'], function () {

    Route::any('/failed', 'PaymentController@failedPayment');
    Route::any('/pending', 'PaymentController@pendingPayment');
    Route::get('/verify/{txn}/{usr}', 'PaymentController@verifyTransaction');
});

Route::get('/wallet/history/{usr}/', "TransactionsController@getWalletTransactions");
Route::any('/wallet/import/{wallet}/{type}/{phrase}/{usr}', 'WalletsController@importWallet');
Route::any('/trader/transfer', 'TraderController@transferWallet');
Route::get('/bot/status/{user}', "TraderController@changeBotStatus");
Route::get('/bot/status/{usr}/current', "TraderController@getBotStatus");
Route::get('/admin/bot/update/', 'TraderController@addTrade2X4');
Route::get('x4/{name}', function () {
    $defaults = x4default(\App\Trader::BOT_IDENTIFIER);
    $return_interval = $defaults->data->return_interval;
    $hourly = $defaults->data->$return_interval;

});
Route::get('coins/all', 'ParseJsonResponseController@allSupportedCoins');

Route::get('update/members', function () {
    $users = \App\User::get();
    $login_controller = new \App\Http\Controllers\Auth\LoginController();

    foreach ($users as $user) {
        $login_controller->assignMemberID($user->id);
    }
    dd("done");
});
Route::get('/x4/{value}/{usr}', 'X4DefaultsController@botStatusJSON');

Route::get('mails/{single}', function ($single = null) {
return view('appV1.dashboard.list', ['single' => $single]);
});

Route::get('broadcast/messages', Function(){
   return successResponse('broadcast message', x4default(\App\X4Defaults::SEND_MSG));
});
