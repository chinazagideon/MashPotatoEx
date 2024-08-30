<?php

namespace App\Http\Controllers;

use App\Http\Resources\TickerResource;
use App\OrderBook;
use App\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function market()
    {
        $call = requestcall("GET", "https://api.poloniex.com/markets/ticker24h");
        $market_controller = new MarketController();

        for ($count = 0; $count <= 150; $count++) {
            $data = [
                "open" => $call[$count]->open,
                "close" => $call[$count]->close,
                "quantity" => $call[$count]->quantity,
                "amount" => $call[$count]->amount,
                "displayName" => $call[$count]->displayName,
                "dailyChange" => $call[$count]->dailyChange,
                "bid" => $call[$count]->bid,
                "ask" => $call[$count]->ask,
                "askQuantity" => $call[$count]->askQuantity,
                "bidQuantity" => $call[$count]->bidQuantity,
                "markPrice" => $call[$count]->markPrice,
                "symbol" => $call[$count]->symbol,
            ];
            $market_controller->save($data);
        }

        return true;

    }

    public function getTickers($pair)
    {
        $call = requestcall("GET", 'https://api.poloniex.com/markets/' . $pair . '/orderBook');
        $asks_response = array_chunk($call->asks, 2);
        $bids_response = array_chunk($call->bids, 2);

        for ($count = 0; $count < count($asks_response); $count++) {
            $data = [
                "price" => $asks_response[$count][0],
                "qty" => $asks_response[$count][1],
                'pair' => $pair,
                'type' => "asks",
                "scale" => $call->scale
            ];
            $this->saveOrderBooks($data);
        }
        for ($count = 0; $count < count($bids_response); $count++) {
            $data2 = [
                "price" => $bids_response[$count][0],
                "qty" => $bids_response[$count][1],
                'pair' => $pair,
                'type' => "bids",
                "scale" => $call->scale
            ];
            $this->saveOrderBooks($data2);
        }
        return true;
    }

    public function tickerJson($symb, $type)
    {
        //check if pair exist
        if (!OrderBook::where('pair', $symb)->exists()) {
            $this->getTickers($symb);
        }
        $bids = OrderBook::where('type', $type)
            ->where('pair', $symb)
            ->take(10)
            ->inRandomOrder()
            ->get();

        $bids = TickerResource::collection($bids);
        return $bids;
    }

    public function saveOrderBooks($data = [])
    {
        $orderbook = new OrderBook();
        $orderbook->price = $data['price'];
        $orderbook->qty = $data['qty'];
        $orderbook->type = $data['type'];
        $orderbook->pair = $data['pair'];
        $orderbook->scale = $data['scale'];
        $orderbook->status = 1;
        $orderbook->save();
        return true;
    }
}
