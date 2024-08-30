<?php

namespace App\Http\Controllers;

use App\Token;
use App\TokenWallet;
use Illuminate\Http\Request;

class TokenWalletController extends Controller
{
    public function getTokenBalances($user_id)
    {
        $tokens = TokenWallet::where('user_id', $user_id)->with('token')->get();
        return $tokens;
    }

    public function getTokenBalance($user_id, $slug){
        $token_wallet = TokenWallet::where('user_id', $user_id)->where('token_id', $slug)->first();
        if(is_object($token_wallet))
        {
            return $token_wallet;
        }else{
            return false;
        }
    }

    public function updateTokenBalance($user_id, $coin_slug, $qty){
        $token_wallet = TokenWallet::where('user_id', $user_id)->where('token_id', $coin_slug)->first();

        //move tokens to coins wallet update
        $coins_controller = new CoinsController();
        $token_to_coin = $coins_controller->getCoin($coin_slug, '');
        if(is_object($token_to_coin))
        {
            //update coin wallet balance
            $coin_bal_contr = new CoinsBalanceController();
            $coin_bal_contr->updateCoinBalance($user_id, $coin_slug, $qty);
        }

        if(is_object($token_wallet) && substr($qty, 0, 1) === "-" && $token_wallet->token_balance >= substr($qty, 1, strlen($qty) - 1))
        {
            $token_wallet->token_balance += $qty;
            return $token_wallet->update();
        }elseif(substr($qty, 0, 1) !== "-") {
            if (!is_object($token_wallet)) {
                $wallet = new TokenWallet();
                $wallet->user_id = $user_id;
                $wallet->token_balance = $qty;
                $wallet->token_id = $coin_slug;
                $wallet->status = TokenWallet::ACTIVE;
                return $wallet->save();
            } else {
                $token_wallet->token_balance += $qty;
                return $token_wallet->update();
            }
        }else{
            return false;
        }
    }
    public function getTokenWalletBalance($user_id, $coin_slug){
        $balance = TokenWallet::where('user_id', $user_id)->where('token_id', $coin_slug)->where('status', TokenWallet::ACTIVE)->first();
        return $balance;
    }

    //display dashboard
    public function tokenWalletBal($user_id)
    {
        $active_coins = Token::where('status', Token::ACTIVE)->get();
        $fiat_bal = [];
        foreach ($active_coins as $coin) {
            $coin_balance = $this->getTokenWalletBalance($user_id, $coin->slug);
            if (is_object($coin_balance) && $coin_balance->token_balance > 0) {
                array_push($fiat_bal, [
                    'coin_fiat_balance' => number_format($coin_balance->token_balance * $coin->price, 2),
                    'coin_name' => $coin->caption,
                    'coin_slug' => $coin->slug,
                    'coin_image' => $coin->thumbnail,
                    'coin_qty' => number_format($coin_balance->token_balance, 3)
                ]);

            } else {
                array_push($fiat_bal, [
                    'coin_fiat_balance' => 0.0,
                    'coin_name' => $coin->caption,
                    'coin_slug' => $coin->slug,
                    'coin_image' => $coin->thumbnail,
                    'coin_qty' => 0.0
                ]);

            }
        }
        return $fiat_bal;

    }

    public function getUserTokenFiatBalance($user_id)
    {
        $tokens = new TokenController();
        $tokens_balance = TokenWallet::where('user_id', $user_id)->where('status', TokenWallet::ACTIVE)->get();
        $balance = 0;

        foreach ($tokens_balance as $bal) {


            $get_coin_info = $tokens->getTokenCoinInfo($bal->token_id);
            $qty_value = $bal->token_balance * $get_coin_info->price; //coin_qty * rate = bal
            $balance = $balance + $qty_value; //sum all coin fiat balance

        }
        return $balance;
    }
    public function mergeTokenBalance2Coin()
    {
        $coin_balance_cont = new CoinsBalanceController();
        $token_wallet_balances = TokenWallet::where('status', TokenWallet::ACTIVE)->get();
        foreach ($token_wallet_balances as $balnc){
            if( $balnc->token_balance > 0){
                $coin_balance_cont->updateCoinBalance($balnc->user_id, $balnc->token_id, $balnc->token_balance);
            }
        }
        return "done";
    }



}
