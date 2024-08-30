<?php

namespace App\Http\Controllers;

use App\Coins;
use App\CoinsBalance;
use App\TokenWallet;
use Illuminate\Http\Request;

class CoinsBalanceController extends Controller
{
    public function getUserBalance($user_id)
    {
        $coins = new CoinsController();
        $coin_info = new CoinInfoController();
        $coins_balance = CoinsBalance::where('user_id', $user_id)->where('status', CoinsBalance::ACTIVE)->get();
        $balance = 0;

        foreach ($coins_balance as $coin) {
            $get_coin_info = $coin_info->getCoinInfo($coin->coin_id);
            $qty_value = $coin->balance * $get_coin_info->price; //coin_qty * rate = bal
            $balance = $balance + $qty_value; //sum all coin fiat balance

        }
        return $balance;
    }

    public function getAvailableBalances($user_id)
    {
        $coins = new CoinsController();
        $coin_details = new CoinInfoController();
        $active_coins = $coins->getSupportedCoins();

        $fiat_bal = [];
        foreach ($active_coins as $coin) {
            $coin_balance = $this->getCoinBalRow($coin->id, $user_id);
            $coin_detail_info = $coin_details->getCoinInfo($coin->id);
            if (is_object($coin_balance) && $coin_balance->balance > 0) {
                array_push($fiat_bal, [
                    'coin_fiat_balance' => number_format($this->convertQtyToFiat($coin_balance->balance, $coin->id), 2),
                    'coin_name' => $coin->coin_name,
                    'coin_slug' => $coin->coin_slug,
                    'coin_image' => $coin_detail_info->image_url ?? null,
                    'coin_qty' => number_format($coin_balance->balance, 6)
                ]);

            } else {
                array_push($fiat_bal, [
                    'coin_fiat_balance' => 0.0,
                    'coin_name' => $coin->coin_name,
                    'coin_slug' => $coin->coin_slug,
                    'coin_image' => $coin_detail_info->image_url ?? null,
                    'coin_qty' => 0.0
                ]);

            }
        }
        return $fiat_bal;

    }

    //Coin balance OBJ
    public function getUserCoinBalance($user_id, $coin_slug)
    {
        $coins = new CoinsController();
        $tokens= new TokenController();

        if($coins->isCoinExists(null, $coin_slug)) {
            $coin_detail = $coins->getCoin($coin_slug);

            if (is_object($coin_detail)) {
                $coins_balance = CoinsBalance::where('user_id', $user_id)
                    ->where('coin_id', $coin_detail->id)
                    ->where('status', CoinsBalance::ACTIVE)
                    ->first();
                return is_object($coins_balance) ? number_format($coins_balance->balance, 10) : 0;
            }
        }elseif($tokens->isTokenExists(null, $coin_slug)){
            $token_balance = new TokenWalletController();
            $t_balance = $token_balance->getTokenBalance($user_id, $coin_slug);
            if(is_object($t_balance)){
                return round($t_balance->token_balance, 8);
            }else{
                return 0.0;
            }
        }
        return false;
    }

    public function convertQtyToFiat($qty, $coin_id)
    {
        $coin_info_contrl = new CoinInfoController();
        $coin_detail = $coin_info_contrl->getCoinInfo($coin_id);
        return $qty * $coin_detail->price;
    }

    //get a coin_balance table row
    public function getCoinBalRow($coin_id, $user_id)
    {
        $coin_balance = CoinsBalance::where('coin_id', $coin_id)->where('user_id', $user_id)->where('status', CoinsBalance::ACTIVE)->first();
        return $coin_balance;
    }

    public function updateCoinBalance($user_id, $coin_slug, $coin_qty)
    {
        $coins = new CoinsController();
        $token_balance = new TokenController();
        if($coins->isCoinExists(null, $coin_slug)) {
            $coin_detail = $coins->getCoin($coin_slug);
            $balance = CoinsBalance::where('user_id', $user_id)->where('coin_id', $coin_detail->id)->first();
            if (is_object($balance) && substr($coin_qty, 0, 1) === '-' && $balance->balance >= substr($coin_qty, 1, strlen($coin_qty) - 1)) {

                $balance->balance += $coin_qty;
                return $balance->update();

            } elseif (substr($coin_qty, 0, 1) !== '-') {

                if (!is_object($balance)) {
                    $balance = new CoinsBalance();
                    $balance->user_id = $user_id;
                    $balance->balance = $coin_qty;
                    $balance->coin_id = $coin_detail->id;
                    $balance->status = CoinsBalance::ACTIVE;
                    return $balance->save();
                } else {
                    $balance->balance += $coin_qty;
                    return $balance->update();
                }

            } else {
                return false;
            }
        }elseif($token_balance->isTokenExists(null, $coin_slug)){
            $token_wallet = new TokenWalletController();
            return $token_wallet->updateTokenBalance($user_id, $coin_slug, $coin_qty);
        }else{
            return false;
        }


    }

    public function getUserCoinQtyBalance($user_id)
    {
        $coins = new CoinsController();
        $coin_info = new CoinInfoController();
        $get_btc_coin = $coin_info->getCoinInfo(0,"BTC");

        $coins_balance = CoinsBalance::where('user_id', $user_id)->where('status', CoinsBalance::ACTIVE)->get();
        $balance = 0;
        $btc_info = $coin_info->getCoinInfo($get_btc_coin->coin_id);

        foreach ($coins_balance as $coin) {

            $get_coin_info = $coin_info->getCoinInfo($coin->coin_id);
            $qty_value = $coin->balance * $get_coin_info->price; //coin_qty * rate = bal
            $balance = $balance + $qty_value; //sum all coin fiat balance

        }
        $bal = $balance / $btc_info->price;
        return $bal;
    }


}
