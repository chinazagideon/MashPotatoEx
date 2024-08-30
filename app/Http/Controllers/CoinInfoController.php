<?php

namespace App\Http\Controllers;

use App\CoinInfo;
use App\Coins;
use App\Http\Resources\CoinInfoResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class CoinInfoController extends Controller
{
    public function getCoinInfo($coin_id, $coin_slug = null)
    {
        if (!empty($coin_slug)) {
            $coins = new CoinsController();
            $coin = $coins->getCoin($coin_slug);
            if (is_object($coin)) {
                return CoinInfo::where('coin_id', $coin->id)->where('status', CoinInfo::ACTIVE)->with('coin')->first();
            }
            return false;

        }
        return CoinInfo::where('coin_id', $coin_id)->where('status', CoinInfo::ACTIVE)->with('coin')->first();
    }

    public function getCoinSlugInfo($coin_slug)
    {
        $coin_cntrl = new CoinsController();
        $coin = $coin_cntrl->getCoin($coin_slug);
        if (is_object($coin)) {
            return $this->getCoinInfo($coin->id);
        }
        return false;
    }

    public function CoinsInfo($limit = null)
    {
        return CoinInfo::where('status', CoinInfo::ACTIVE)->with('coin')->take($limit)->get();
    }

    public function getCoinsInfo($coin_slug, $currency)
    {
        $key = env('CRYPTOCOMPARE_KEY');
        $call = requestcall("GET", 'https://min-api.cryptocompare.com/data/pricemultifull?fsyms=' . strtoupper($coin_slug) . '&tsyms=' . $currency . '&api_key=' . $key);

        return $call->RAW->$coin_slug->$currency;
//        try {
//
////            $call = requestcall("GET", 'https://min-api.cryptocompare.com/data/pricemultifull?fsyms=' . strtoupper($coin_slug) . '&tsyms=' . $currency . '&api_key=' . $key);
////
////
////            return $call->RAW->$coin_slug->$currency;
//        }catch (\Exception $e){
//            Log::debug($e->getTraceAsString());
//        }
//        return null;
    }

    public function updateCoinInfo()
    {
        $currency = "USD";
        $active_coins = Coins::where('status', Coins::ACTIVE)->get();


        foreach ($active_coins as $coin) {
            $live_coin_info = $this->getCoinsInfo(strtoupper($coin->apislug), $currency);
//            if(is_object($live_coin_info)) {

            //deactivate formal price
            CoinInfo::where('coin_id', $coin->id)->where('status', CoinInfo::ACTIVE)->update(['status' => CoinInfo::DEACTIVATED]);

            $coininfo = new CoinInfo();
            $coininfo->total_supply = $live_coin_info->SUPPLY;
            $coininfo->market_cap = $live_coin_info->MKTCAP;
            $coininfo->price = $live_coin_info->PRICE;
            $coininfo->currency = $currency;
            $coininfo->coin_id = $coin->id;
            $coininfo->image_url = $live_coin_info->IMAGEURL;
            $coininfo->percent_change_24h = round($live_coin_info->CHANGEPCT24HOUR, 2);
            $coininfo->percent_change_1h = $live_coin_info->CHANGEPCTHOUR;
            $coininfo->status = CoinInfo::ACTIVE;
            $coininfo->save();
//            }
//            return false;
        }

        return true;
    }

    public function getActiveCoinInfo($coin_id)
    {
        if (!empty($coin_id)) {
            return CoinInfo::where('status', CoinInfo::ACTIVE)->where('coin_id', $coin_id)->first();
        }

        return CoinInfo::where('status', CoinInfo::ACTIVE)->get();
    }

    public function getCoinInfoTickerResource($limit)
    {
        $coinInfo = new CoinInfoController();
        $coin_details = $coinInfo->CoinsInfo($limit);
        return CoinInfoResource::collection($coin_details);
    }

}
