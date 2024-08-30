<?php

namespace App\Http\Controllers;

use App\CoinInfo;
use App\Coins;
use App\Http\Resources\SupportedCoinResource;
use Illuminate\Http\Request;

class CoinsController extends Controller
{
    public function getSupportedCoins($allowed_coins = null)
    {
        if (!empty($allowed_coins)) {
            return Coins::where('allowed_deposit', 1)
//                ->with('coin_info')
                ->get();
        }

        $coins = Coins::where('status', Coins::ACTIVE)
            ->where('status', Coins::ACTIVE)
            ->with('coin_info')
            ->get();
        return $coins;
    }

    public function getCoin($coin_slug, $coin_id = null)
    {

        if (!empty($coin_id)) {
            return Coins::where('id', $coin_id)->with('coin_info')->first();

        }

        return Coins::where('coin_slug', $coin_slug)->with('coin_info')->first();
    }

    public function disableInActiveCoins()
    {
        $coins = Coins::where('status', Coins::DEACTIVATED)->get();
        foreach ($coins as $coin) {
            CoinInfo::where('coin_id', $coin->id)->update(['status' => CoinInfo::DEACTIVATED]);
        }
        return true;
    }

    public function isCoinExists($coin_id = null, $coin_slug = null)
    {
        if (!empty($coin_slug))
            return Coins::where('coin_slug', $coin_slug)->exists();
        return Coins::where('id', $coin_id)->exists();
    }

    public function updateCoinAPY(Request $request)
    {
        $coin_id = $request->input('coin_slug');
        $apy = $request->input('apy');
        if (!empty($apy) && is_numeric($apy)) {
            $coins = Coins::where('id', $coin_id)->first();
            $coins->apr = $apy;
            return $coins->update();

        }
        return false;
    }

    public function listCoinResource()
    {
        $coins = $this->getSupportedCoins();
        return SupportedCoinResource::collection($coins);
    }

    public function getCoinJson($coin_slug)
    {
        $coin = $this->getCoin($coin_slug);
        return successResponse('coin list', ['coin' => $coin]);
    }

    public function allowedCoins()
    {
        $coins = $this->getSupportedCoins(1);
        return SupportedCoinResource::collection($coins);
    }
}
