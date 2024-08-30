<?php

namespace App\Http\Controllers;

use App\Coins;
use App\Coinsale;
use App\CoinsalesData;
use App\Token;
use App\TokenWallet;
use App\UserCoinsales;
use Illuminate\Http\Request;
use \Auth;

class TokenController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }
    
    public function sales()
    {
        return view('appV1.dashboard.sales');
    }

    public function salesPage()
    {
        return view('appV1.dashboard.salespage');
    }

    public function fiatWallet()
    {
        $token_wallet = new TokenWalletController();
        $token_balances = $token_wallet->getTokenBalances(Auth::user()->id);

        return view('appV1.dashboard.fiatwallet', ['token_balances' => $token_balances, 'wallets' => $token_wallet->tokenWalletBal(Auth::user()->id)]);
    }

    public function getTokenInfo()
    {
        $tokens = Token::where('status', Token::ACTIVE)->get();
        $coinInfo = new CoinInfoController();
        foreach ($tokens as $token) {
            $market_data = $coinInfo->getCoinsInfo($token->slug, 'USD');
            $get_tokens = Token::where('slug', $token->slug)->first();
            $get_tokens->thumbnail = $market_data->IMAGEURL;
            $get_tokens->price = $market_data->PRICE;
            $get_tokens->max_supply = $market_data->SUPPLY;
            $get_tokens->currency = $market_data->TOSYMBOL;
            $get_tokens->update();
        }
        return true;
    }

    public function getOtherStakingCoins()
    {
        $tokens = Token::where('status', Token::ACTIVE)->get();
        return $tokens;
    }

    public function getTokenCoinInfo($coin_slug = null, $coin_id = null)
    {
        if (!empty($coin_id))
            return Token::Where('id', $coin_id)->first();
        $token = Token::where('slug', $coin_slug)->first();
        return $token;
    }

    public function isTokenExists($coin_id = null, $coin_slug = null)
    {
        if (!empty($coin_slug))
            return Token::where('slug', $coin_slug)->exists();
        return Token::where('id', $coin_id)->exists();
    }

    public function buyPresale($coin)
    {
        $coinsale = Coinsale::where('coin_slug', $coin)->first();
        $coinsaledata = CoinsalesData::where('coinsales_id', $coinsale->id)->get();
        if(is_object($coinsale) && $coinsaledata->count() > 0) {
            return view('appV1.dashboard.presale', [
                'coin_sale_data' => $coinsaledata,
                'coin' => $coinsale,
                ]);
        }
        return redirect()->route('sales')->with('status', 'Invalid token');
    }

    public function processPurchase(Request $request)
    {
        $coinsale_user = new UserCoinsales();
        $coinsale_user->user_id = $request->user()->id;
        $coinsale_user->no_token_purchased = $request->input('amount');
        $coinsale_data_id = $request->input('token_option');

        $coinsale_data = CoinsalesData::where('id', $coinsale_data_id)->first();
        $coinsale_user->price_per_token = $coinsale_data->price_per_token;
        $coinsale_user->coinsale_id = $coinsale_data->coinsales_id;


        $coinsale_user->trans_id = md5(time());
        $coinsale_user->payment_method = $request->input('coin_slug');


        $coin_data = new CoinInfoController();
        $coin_data = $coin_data->getCoinSlugInfo($coinsale_user->payment_method);

        $fiat_amount = $coinsale_user->no_token_purchased * $coinsale_user->price_per_token;
        $coinsale_user->fiat_amount = $fiat_amount;
        $coinsale_user->paid_qty = $coinsale_user->fiat_amount / $coin_data->price;

        $coin_balance = new CoinsBalanceController();
        $update_balance = $coin_balance->updateCoinBalance($coinsale_user->user_id, $coinsale_user->payment_method, -$coinsale_user->paid_qty);
        if($update_balance)
        {
            $coinsale_user->save();
            return redirect()->route('dashboard')->with('status', 'Tokens purchased successfully, you will be notified once the tokens is added to your wallet.');

        }else
        {
            return redirect()->back()->with('status', 'Unable to process order');
        }


    }

    public function presaleOrders()
    {
        $coinsale_user_data = UserCoinsales::where('user_id', \Auth::user()->id)->with('user')->with('coinsaledata')->get();
        return view('appV1.dashboard.sales', ['pre_orders' =>$coinsale_user_data]);
    }
    
    public function updateTokenAPY(Request $request)
    {
        $coin_slug = $request->input('coin_slug');
        $apy = $request->input('apy');
        $token = Token::where('slug', $coin_slug)->first();
        if(is_object($token) && is_numeric($apy)){
            $token->apy = $apy;
            return $token->update();
        }else{
            return false;
        }
    }


}
