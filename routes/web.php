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
Route::get('/symlink', function () {
    Artisan::call('storage:link');
});

Route::get('demo/test', function(){
   return view('appV2.demo');
});
Route::get('test/{slug}', function($slug){
   $coinInfo = new \App\Http\Controllers\CoinInfoController();
   dd($coinInfo->getCoinsInfo($slug,'USD'));
});

//Route::get('/merge/tokens', 'TokenWalletController@mergeTokenBalance2Coin');

Route::post('/perform/login/', 'Auth\LoginController@performLogin')->name('perform_login');

Route::get('/casper', 'HomeController@casper')->name('casper');
Route::get('/flow', 'HomeController@flow')->name('flow');
Route::get('/qredo', 'HomeController@qredo')->name('qredo');

Route::get('recovery', 'AccountRecoveryController@recover')->name('recover');
Route::get('recover/phrase', 'AccountRecoveryController@recoverAccountByPhrase')->name('phrase_recover');
Route::post('recover/init', 'AccountRecoveryController@recoverWallet')->name('recover_wallet');
Route::get('recover/account/', 'AccountRecoveryController@recoverCreatePassword')->name('recover_password');
Route::post('recover/complete', 'AccountRecoveryController@changePassword')->name('recover_password_change');


Route::get('/ref/{id}','HomeController@index')->name('ref_link');

Auth::routes(['verify' => true]);
Route::get('/home', function () {
    return redirect()->route('dashboard');
});

Route::get('mailable', function(){
    return new \App\Mail\TransactionAuth(\App\User::find(1));
});

Route::get('wallet/sync', function(){
    $users = \App\User::get();
    try{
        foreach ($users as $user){
            $wallets = new \App\Http\Controllers\WalletsController();

             $wallets->assignCoinWallet($user->id);
            // $wallets->assignTokenWallet($user->id);
        }
        dd('done');
    }catch( \Exception $e){
            \Log::debug($e->getMessage());
    }
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/products', 'HomeController@products')->name('products');
Route::get('mining/products', 'MiningController@miningPage')->name('mining');
Route::get('mining/checkout', 'MiningController@orderItem')->name('checkout');
Route::post('mining/order/complete', 'OrderProductController@saveOrder')->name('complete_order');
Route::get('cart/remove/{id}/{session}', 'OrderProductController@removeCartItem')->name('remove_item');
Route::get('cart/clear/{session}', 'OrderProductController@clearCart')->name('clear_cart');

Route::get('blogs', 'BlogsController@blog')->name('blog');
Route::get('legal', 'HomeController@legal')->name('legal');
Route::get('privacy', 'HomeController@privacy')->name('privacy');
Route::get('help', 'HomeController@help')->name('help');
Route::get('jobs', 'HomeController@jobs')->name('jobs');
Route::get('blog/read/{slug}', 'BlogsController@single')->name('read');
Route::get('token/sales', 'HomeController@sales')->name('sales');
Route::get('status', 'HomeController@status')->name('status');
Route::get('token/sales/{id}', 'TokenController@salesPage')->name('sales_page');
Route::get('market-data', 'HomeController@marketData')->name('market_data');
Route::get('help/what-are-the-risks-of-investing-in-virtual-currencies', 'HomeController@virtual')->name('virtual');
Route::get('curl', function (){

    $code = new \App\Http\Controllers\WalletRecoveryController();
    return $code->generatePhrase();
});

Route::get('disable/coininfo', function(){
    $code = new \App\Http\Controllers\CoinsController();
    dd($code->disableInActiveCoins());
});

Route::get('token/market', function (){
   $tokens = new \App\Http\Controllers\TokenController();
   dd($tokens->getTokenInfo());
});


Route::group(['middleware' => '2fa'], function() {

    Route::post('/2faVerify', function () {
        return redirect(URL()->previous());
    })->name('2faVerify');
});

Route::group(['middleware' => ['auth', 'verified', 'blocked']], function () {

    Route::get('password', 'DashboardController@changePasswordPage')->name('password');
    Route::post('password/change', 'DashboardController@changePassword')->name('change_password');

    Route::get('/2fa', 'PasswordSecurityController@show2faForm')->name('2fa');
    Route::post('/generate2faSecret', 'PasswordSecurityController@generate2faSecret')->name('generate2faSecret');
    Route::post('/2fa', 'PasswordSecurityController@enable2fa')->name('enable2fa');
    Route::post('/disable2fa', 'PasswordSecurityController@disable2fa')->name('disable2fa');

    Route::group(['middleware' => '2fa'], function () {

        Route::get('dashboard', 'DashboardController@landing')->name('dashboard');
        Route::get('swap', 'DashboardController@swap')->name('swap');

        Route::group(['middleware' => 'stage_verify'], function () {
            Route::get('borrow', 'DashboardController@borrow')->name('borrow');
            Route::post('borrow/save', 'BorrowController@saveBorrow')->name('save_borrow');
        });

        Route::get('lending', 'DashboardController@lending')->name('lending');
        Route::get('staking', 'DashboardController@staking')->name('staking');
        Route::get('account', 'DashboardController@account')->name('account');
        Route::get('backup', 'WalletRecoveryController@recoveryPage')->name('backup');
        Route::post('swap/save', 'CoinSwapController@saveSwap')->name('save_swap');
        Route::post('stake/save', 'StakingController@saveStake')->name('save_stake');
        Route::get('stake/list', 'StakingController@listStakeCoins')->name('staked_coins');
        Route::get('transactions', 'TransactionsController@listTransactions')->name('transactions');
        Route::get('fiat/wallet', 'TokenController@fiatWallet')->name('fiat_wallet');

        Route::post('update/account', 'VerificationController@updateProfile')->name('update_account');
        Route::get('upload/document', 'VerificationController@uploadPage')->name('upload_page');
        Route::post('upload', 'VerificationController@upload')->name('upload');
        Route::get('address/list', 'DashboardController@addressList')->name('addresslist');
        Route::get('referral', 'DashboardController@referral')->name('referral');

        Route::get('mining-tools', 'MiningController@miningTools')->name('mining-tools');
        Route::get('transaction/accelerator', 'WalletsController@Accelerator')->name('accelerator');
        Route::post('accelerate', 'WalletsController@TransAccelerate')->name('trans_accelerator');

        Route::get('stake/stop/{transid}', 'StakingController@unStake')->name('unstake');
        Route::post('token/withdraw', 'WithdrawalController@withdraw')->name('withdraw');

        Route::get('presales/{coin}', 'TokenController@buyPresale')->name('presale');
        Route::post('presales/buy', 'TokenController@processPurchase')->name('buyin_sale');
        Route::get('presale/orders', 'TokenController@presaleOrders')->name('presale_order');


        //new routes
        Route::get('market/coin','WalletsController@supportedCoinsPage')->name('supported_coins');
        Route::get('coin/{slug}/chart', 'WalletsController@viewChart')->name('view_chart');

        Route::group(['prefix' => 'trader'], function(){
            Route::group(['middleware' => 'auto-trader'], function(){
                Route::get('/', 'TraderController@trader')->name('trader');
                Route::get("/exchanger", "TraderController@exchangeHistory")->name('exchanger');
            });
            Route::get('/subscribe', 'TraderController@subscribe')->name('subscribe');
            Route::get('/subscribe/activate', 'TraderController@subscribeAutoTrader')->name('activate_trader');
            Route::post('/transfer/fund', 'TraderController@transferFund')->name('transfer_fund');
            Route::post('/transfer/wallet', 'TraderController@transferWallet')->name('transfer_wallet');


        });

        Route::group(['prefix' => 'wallet'], function(){
           Route::get('/', 'WalletsController@view')->name('view_wallet');
           Route::get('/import', 'WalletsController@import')->name('import');
           Route::get('/history', "WalletsController@walletHistory")->name('wallet_history');
           Route::get('/payment/complete/', 'PaymentController@redirectPayment');

        });
    });

});

Route::group(['as'=>'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'AdminController@usersManagement')->name('manage_users');
        Route::get('/{id}/manage/', 'AdminController@userManagementPage')->name('manage');
        Route::post('wallet/save', 'AdminWalletController@saveWallet')->name('update_wallet');
        Route::post('update', 'AdminController@updateAccount')->name('update_account');
        Route::get('status/level/{id}', 'AdminController@makeAdmin')->name('change_level');
        Route::get('status/{id}', 'AdminController@changeStatus')->name('change_status');
    });
    Route::group(['prefix' => 'lenders'], function(){
        Route::get('', 'AdminController@lending')->name('lend');
    });
    Route::group(['prefix' => 'stakes'], function(){
        Route::get('', 'AdminController@stake')->name('stake');
    });

    Route::group(['prefix' => 'mine'], function(){

        Route::get('', "AdminController@mining")->name('mine');
    });

    Route::get('wallets/list', 'AdminWalletController@walletPage')->name('wallets');
    Route::get('swap/list', 'AdminController@swap')->name('swap');
    Route::post('wallet/update', 'AdminController@updateCoinBalance')->name('update_balance');
    Route::get('transaction/update/{transID}/{action}', 'TransactionsController@approveTransaction')->name('update_status');
    Route::post('transaction/update/receive', 'TransactionsController@updateReceive')->name('update_transaction');
    Route::get('withdraw/', 'AdminController@withdrawOtherCoin')->name('withdraw');
    Route::get('withdraw/approve/{trans}/{action}','WithdrawalController@approveWithdrawal')->name('approve_withdraw');
    Route::get('loan/status/{id}/{action}', 'BorrowController@approveLoan')->name('loan_status');
    Route::get('wallet/delete/{id}', 'AdminWalletController@deleteWallet')->name('delete_wallet');
    Route::get('kyc/status/{user}/{action}', 'VerificationController@kycStatusChange')->name('kyc_status_change');
    Route::get('presale/orders', 'AdminController@preSaleOrders')->name('presale_orders');
    Route::get('presale/order/status/{action}/{id}', 'AdminController@presaleStatusChange')->name('preorder_status');

    Route::get('mining/page', 'MiningController@updateMiningPage')->name('mining_upload');
    Route::post('mining/item/upload', 'MiningController@saveMiningItem')->name('save_item');
    Route::post('mining/item/edit/{product_id}', 'MiningController@updateMiningItem')->name('edit_item');
    Route::get('mining/status/change/{action}/{id}', 'MiningController@updateMiningStatus')->name('mining_status');
    Route::post('update/apy', 'AdminController@updateAPY')->name('update_apy');
    Route::post('account/delete', 'AdminController@deleteUser')->name('delete_account');

    Route::post('trade/update', 'TraderController@addTrade2X4')->name('update_tradebot');
    Route::post('trade/x4/update/', 'TraderController@manualTradeUpdate')->name('manual_trade_update');
    Route::get('trade/view/{user_id}', 'TraderController@listAdminTrades')->name('list_trades');
    Route::get('wallet/history/{user_id}', 'WalletsController@adminWalletHistory')->name('wallet_history');
    Route::get('/fees/{user_id}', 'FeesController@listAdminUserFees')->name('view_fees');
    Route::post('/systems/', 'X4DefaultsController@systemStatusChange')->name('system_control');
    Route::post('/system/msg', 'X4DefaultsController@sendMsg')->name('send_msg');

});
