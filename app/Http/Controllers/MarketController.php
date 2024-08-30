<?php

namespace App\Http\Controllers;

use App\Http\Resources\MarketResource;
use App\Market;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function save($data = []){
        $market = Market::where('displayName', $data['displayName'])->first();
        if(is_object($market)){
            $market->open = $data['open'];
            $market->close = $data['close'];
            $market->amount = $data['amount'];
            $market->quantity = $data['quantity'];
            $market->dailyChange = $data['dailyChange'];
            $market->bidQuantity = $data['bidQuantity'];
            $market->askQuantity = $data['askQuantity'];
            $market->bid = $data['bid'];
            $market->ask = $data['ask'];
            $market->markPrice = $data['markPrice'];
            $market->update();

        }else{
            $market = new Market();
            $market->open = $data['open'];
            $market->displayName = $data['displayName'];
            $market->symbol = $data['symbol'];
            $market->close = $data['close'];
            $market->amount = $data['amount'];
            $market->quantity = $data['quantity'];
            $market->dailyChange = $data['dailyChange'];
            $market->bidQuantity = $data['bidQuantity'];
            $market->askQuantity = $data['askQuantity'];
            $market->bid = $data['bid'];
            $market->ask = $data['ask'];
            $market->markPrice = $data['markPrice'];
            $market->save();
        }
        return true;
    }

    public function getMarketResource($limit = 100){
        $market = Market::where('status', 1)->inRandomOrder()->take($limit)->get();
        return MarketResource::collection($market);
    }

    public function getLastPrice($pair){
        $market = Market::where('symbol', $pair)->first();
        $exp = explode("_", $market->symbol);
        return successResponse($exp[0], $market->toArray());
    }

    public function getRandomMarketPair(){
        return Market::where('status', Market::ACTIVE)->inRandomOrder()->first();
    }
}
