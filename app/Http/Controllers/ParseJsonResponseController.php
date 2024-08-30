<?php

namespace App\Http\Controllers;

use App\Coins;
use App\CoinsalesData;
use App\CoinsBalance;
use App\Mining;
use App\User;
use App\Transactions;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Mail;
use App\Mail\AccelerateTransactionEmail;

class ParseJsonResponseController extends Controller
{

    public function getSupportedCoinJQ()
    {
        $coins = new CoinsController();
        $supported_coins = $coins->getSupportedCoins();

        if (isset($supported_coins)) {
            return \request()->json(Response::HTTP_OK, ['status' => true, 'coins' => $supported_coins]);
        }
        return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'coins' => '']);
    }

    public function getCoinsInfoJQ($limit = null)
    {
        $coinInfo = new CoinInfoController();
        $coin_details = $coinInfo->CoinsInfo($limit);
        if (isset($coin_details)) {
            return \request()->json(Response::HTTP_OK, ['status' => true, 'coins' => $coin_details]);
        }
        return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'coins' => '']);

    }

    public function getCoinInfoJQ($coin_slug)
    {
        $coin_info = new CoinInfoController();
        $supported_coin = new CoinsController();
        $coin = $supported_coin->getCoin($coin_slug);
        if (is_object($coin)) {
            $coin_details = $coin_info->getCoinInfo($coin->id);
            if (is_object($coin_details)) {
                return \request()->json(Response::HTTP_OK, ['status' => true, 'coin' => $coin_details]);
            }
        }
        return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'coin' => ""]);

    }

    public function userFiatBalance($user_id)
    {
        $coin_balance = new CoinsBalanceController();
        $fiat_balance = $coin_balance->getUserBalance($user_id);
        $user_coin_bal = $coin_balance->getUserCoinQtyBalance($user_id);
        $token_wallet = new TokenWalletController();
        $token_fiat_balance = $token_wallet->getUserTokenFiatBalance($user_id);
        if ($fiat_balance > 0 || $token_fiat_balance > 0 || $user_coin_bal > 0) {
            $bal = $fiat_balance + $token_fiat_balance;
            return \request()->json(Response::HTTP_OK, ['status' => true, "fiat_balance" => round($bal, 3), "btc_coin_balance" => round($user_coin_bal, 6)]);
        }
        return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'fiat_balance' => 0, "btc_coin_balance" => 0.00]);
    }

    public function userAllFiatBalance($user_id)
    {
        $coin_balance = new CoinsBalanceController();
        $balances = $coin_balance->getAvailableBalances($user_id);
        if (isset($balances)) {
            return \request()->json(Response::HTTP_OK, ['status' => true, "fiat_balances" => $balances]);
        }
        return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, "fiat_balances" => ""]);

    }

    public function getUserTransactions($user_id)
    {
        $transactions = new TransactionsController();
        if (isset($transactions))
            return \request()->json(Response::HTTP_OK, ['status' => true, 'transactions' => $transactions->getUserTransactions($user_id)]);
        return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'transactions' => '']);
    }

    public function swapCoin(Request $request)
    {
        $coin_1 = $request->input('from_coin_slug');
        $coin_2 = $request->input('to_coin_slug');

        $coin_info = new CoinInfoController();
        $coin_controller = new CoinsController();

        $coin_1_qty = $request->input('from_coin_qty');
        if (!empty($coin_1) && !empty($coin_2)) {
            //coin
            $coin_1_info = $coin_info->getCoinInfo('', $coin_1);
            $coin_2_info = $coin_info->getCoinInfo('', $coin_2);
            //coins detail
            $coin_1_details = $coin_controller->getCoin($coin_1);

            $fee_percent = $coin_1_details->fee / 100;

            //convert to fiat
            $coin_1_qty_to_fiat = $coin_1_qty * $coin_1_info->price;

            $coin_1_fiat_value = $coin_1_qty_to_fiat - ($fee_percent * $coin_1_qty_to_fiat);

            //coin_2_qty to get
            $coin_2_qty = $coin_1_fiat_value / $coin_2_info->price;
            if ($coin_1_qty >=  $coin_1_details->threshold) {

                return \request()->json(Response::HTTP_OK, [
                    'status' => true,
                    'swap_response' => [
                        'fee' => $coin_1_details->fee,
                        'threshold' => $coin_1_details->threshold,
                        'coin_1_info' => $coin_1_info,
                        'coin_2_info' => $coin_2_info,
                        'coin_2_qty' => round($coin_2_qty, 4)
                    ],
                    'message' => 'Swap details']);
            } else {
                return \request()->json(Response::HTTP_NOT_FOUND, [
                    'status' => false,
                    'swap_response' => ['coin_2_info' => $coin_2_info],
                    'message' => 'Minimum ' . $coin_1_details->coin_name . ' threshold is ' . $coin_1_details->threshold . '' . $coin_1_details->coin_slug]);

            }
        } else {
            return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'swap_response' => '', 'message' => '']);
        }
    }

    public function getSingleCoinBalance($user_id, $coinslug)
    {
        $coin_cntr = new CoinsBalanceController();
        $coin_balance = $coin_cntr->getUserCoinBalance($user_id, $coinslug);
        if (!empty($coin_balance)) {
            return \request()->json(Response::HTTP_OK, ['status' => true, 'coin_balance' => $coin_balance]);
        } else {
            return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'coin_balance' => '0.0']);
        }

    }

    public function coinBorrowCalc(Request $request)
    {
        $borrow = new BorrowController();
        $calc = $borrow->calcBorrow($request);

        if ($calc !== false) {
            return \request()->json(Response::HTTP_OK, ['status' => true, 'response' => $calc]);
        } else {
            return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'collateral_coin_qty' => 0.0, 'message' => 'Unable to continue, Minimum loan fiat amount is $50,000 USD and maximum of $500,000']);
        }
    }

    public function calcStaking(Request $request)
    {
        $staking = new StakingController();
        $calc = $staking->calcReturns($request);
        if ($calc['status'] == true) {
            return \request()->json(Response::HTTP_OK, ['status' => true, 'response' => $calc]);
        } else {
            return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'response' => '', 'msg' => $calc['msg']]);
        }
    }

    public function backupValidate(Request $request)
    {
        $wallet = new WalletRecoveryController();
        $validate = $wallet->verifyWalletBackup($request);
        if ($validate !== false)
            return \request()->json(Response::HTTP_OK, ['status' => true, 'response' => $validate]);
        return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'response']);

    }

    public function depositAddress(Request $request)
    {
        $coin_slug = $request->input('coin_slug');
        $user_id = $request->input('user_id');

        $coin = new CoinsController();
        $coin_detail = $coin->getCoin($coin_slug);

        $wallet = new WalletsController();
        $address = $wallet->getUserActiveWallet($user_id, $coin_detail->id);
        if (!empty($address)) {
            return \request()->json(Response::HTTP_OK, ['status' => true, 'address' => $address, 'coin_name' => strtolower($coin_detail->coin_name)]);
        } else {
            return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'address' => '', 'message' => 'Wallet address not found!']);
        }
    }

    public function transferCoinData(Request $request)
    {
        $wallet = new WalletsController();
        $send = $wallet->sendCoin($request);
        if ($send['status']) {
            return successResponse($send['message'], []);
//            return \request()->json(Response::HTTP_OK, ['status' => $send['status'], 'transaction' => '', 'message' => $send['message']]);
        } else {
            return errorResponse($send['message'], []);
//            return \request()->json(Response::HTTP_NOT_FOUND, ['status' => $send['status'], 'transaction' => '', 'message' => $send['message']]);

        }
    }

    public function getOtherStakingCoins()
    {
        $tokens = new TokenController();
        $coins = new CoinsController();
        $list = $coins->getSupportedCoins();
        return \request()->json(Response::HTTP_OK, ['status' => true, 'list_coins' => $list, 'other_coins' => $tokens->getOtherStakingCoins()]);
    }

    public function getPriceWidget($coin_slug)
    {
        $coin = new CoinsController();
        $coin_details = $coin->getCoin($coin_slug);
        if (is_object($coin_details)) {
            return \request()->json(Response::HTTP_OK, ['status' => true, 'coins_widget' => $coin_details]);
        } else {
            return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'coins_widget' => '']);
        }
    }

    public function getTokenBalances($user_id)
    {
        $token_wallet = new TokenWalletController();
        return \request()->json(Response::HTTP_OK, ['status' => true, 'fiat_balances' => $token_wallet->tokenWalletBal($user_id)]);

    }

    public function otherCoins()
    {
        $tokens = new TokenController();
        return \request()->json(Response::HTTP_OK, ['status' => true, 'other_coins' => $tokens->getOtherStakingCoins()]);
    }

    public function tokenDepositAddress($coin_slug, $user_id)
    {
        $coin = new TokenController();
        $coin_detail = $coin->getTokenCoinInfo($coin_slug);

        $wallet = new WalletsController();
        $address = $wallet->getUserActiveWallet($user_id, null, $coin_detail->slug);
        if (!empty($address->wallet_address)) {
            return \request()->json(Response::HTTP_OK, ['status' => true, 'address' => $address, 'coin_name' => strtoupper($coin_detail->caption)]);
        } else {
            return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'address' => '', 'message' => 'Wallet address not found!']);
        }
    }

    public function calcTokenWithdrawal(Request $request)
    {
        $coin_qty = $request->input('coin_qty');
        $coin_slug = $request->input('coin_slug');
        $user_id = $request->input('user_id');

        $token = new TokenController();
        $token_info = $token->getTokenCoinInfo($coin_slug);
        $token_wallet = new TokenWalletController();
        $token_wallet_info = $token_wallet->getTokenBalance($user_id, $coin_slug);
        if (is_object($token_wallet_info) && $token_wallet_info->token_balance >= $coin_qty) {

            if ($coin_qty >= $token_info->threshold) {

                $data = [
                    'fiat_amount' => number_format($coin_qty * $token_info->price, 2)
                ];
                return \request()->json(Response::HTTP_OK, ['status' => true, 'msg' => '', 'fiat_amount' => $data['fiat_amount']]);

            } else {
                return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'msg' => 'minimum threshold available for withdrawal is ' . $token_info->threshold . $token_info->slug]);
            }
        } else {
            return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'msg' => "insufficient fund, unable to continue"]);


        }
    }

    public function getPreSaleData($coinsales_id)
    {
        $coinsale = CoinsalesData::where('id', $coinsales_id)->first();
        if (is_object($coinsale)) {
            return \request()->json(Response::HTTP_OK, ['status' => true, 'sale' => $coinsale]);
        }
        return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'sale' => '', 'msg' => 'Invalid data']);

    }

    public function compareUserBalanceCryptoToFiat($coin_slug, $fiat_amount, $user_id)
    {
        $coin_info = new CoinInfoController();
        $coin_market_data = $coin_info->getCoinSlugInfo($coin_slug);
        $fiat_to_coin = $fiat_amount / $coin_market_data->price;

        //check balance
        $coin_balance = new CoinsBalanceController();
        $balance = $coin_balance->getUserCoinBalance($user_id, $coin_slug);

        if ($balance >= $fiat_to_coin) {
            return \request()->json(Response::HTTP_OK, ['status' => true, 'market_data' => $coin_market_data, 'msg' => '']);
        } else {
            return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'market_data' => $coin_market_data, 'msg' => 'insufficient fund to continue']);
        }

    }

    //admin item
    public function getMiningItem($id)
    {
        $mining_item = Mining::where('product_id', $id)->first();
        if (is_object($mining_item)) {
            return \request()->json(Response::HTTP_OK, ['status' => true, 'product' => $mining_item, 'msg' => '']);
        } else {
            return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'product' => '', 'msg' => 'no product found']);
        }
    }

    public function saveReceiverData(Request $request)
    {
        $user_id = $request->input('user_id');
        $wallet_address = $request->input('wallet_address');
        $user = User::find($user_id);
        $subject = "Possible Deposit/Receiver Request";
        $coin_qty = $request->input('coin_qty');
        $hash = $request->input('hash');
        $coin_slug = $request->input('coin_slug');

        $data = [
            "coin_slug" => $coin_slug,
            "coin_qty" => $coin_qty,
            "hash" => $hash,
        ];
        Mail::to(config('app.admin_email'))->send(new AccelerateTransactionEmail($data, $subject, $user->email));
        return \request()->json(Response::HTTP_OK, ['status' => true, 'data' => 'completed']);
    }

    public function authenticateTransaction($user_id)
    {
        $transaction_controller = new TransactionsController();
        $send_auth_mail = $transaction_controller->transactionAuth($user_id);
        if ($send_auth_mail)
            return successResponse('Mail sent, check your email', []);
        return errorResponse("unable to send email, try again");
    }

    public function verifyOtp($user, $otp = null)
    {
        if (!empty($otp)) {
            $transaction_controller = new TransactionsController();
            $verify = $transaction_controller->verifyPin($user, $otp);
            if ($verify)
                return successResponse("Transaction authenticated, click complete to proceed");
        }
        return errorResponse("Unable to verify, pin is incorrect!!.");
    }

    public function getUserTradeBalance($user_id)
    {
        $user = User::find($user_id);
        return successResponse("user trade balance", [
            "trade_balance" => round($user->trade_balance, 4),
            "margin_balance" => round($user->trade_balance - ($user->trade_balance * 0.05), 4),
            'currency' => "USDT",
            'trade_profit' => empty($user->trade_profit) ? '0.00' : round($user->trade_profit, 4),
            'referral_bonus' => empty($user->referral_bonus) ? '0.00' : round($user->referral_bonus, 4),
        ]);
    }

    public function allSupportedCoins()
    {
        $list = $this->getOtherStakingCoins();
        $data = [];
        $array_data = $list['list_coins']->toArray();
        $array_data2 = $list['other_coins']->toArray();
        $merger = array_merge($array_data, $array_data2);
        $collection = new Collection();
        $supported_coins= $collection->concat($merger);
        return successResponse("all supported coins", ['coins' => $supported_coins, 'image_base_url' => env("CRYPTO_COMPARE_URL")]);
    }

}
