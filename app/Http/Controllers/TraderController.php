<?php

namespace App\Http\Controllers;

use App\Http\Resources\TraderResource;
use App\Orders;
use App\Trader;
use App\Transactions;
use App\User;
use App\X4Defaults;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TraderController extends Controller
{
    public function trader()
    {
        $x4d = x4default(X4Defaults::GENERAL_SYSTEM_CONFIG_SLUG);
        if (is_object($x4d)) {
            $trader_status = $x4d->data->trader_status;
            if ($trader_status === X4Defaults::NOT_ACTIVE_STATUS) {
                return redirect()
                    ->route('subscribe')
                    ->with('status2', " TraderBot is currently undergoing maintenance.");
            }
        }

        return view('appV2.exchange');
    }

    public function subscribe()
    {
        return view('appV2.subscriber');
    }

    public function subscribeAutoTrader()
    {
        $user_id = $_GET['user_id'] ?? null;
        $x4d = x4default(X4Defaults::GENERAL_SYSTEM_CONFIG_SLUG);
        if (is_object($x4d)) {
            $trader_status = $x4d->data->trader_status;
            if ($trader_status === X4Defaults::NOT_ACTIVE_STATUS) {
                return redirect()
                    ->back()
                    ->with('status2', " TraderBot is currently undergoing maintenance.");

            }
        }
        $user = !empty($user_id) ? User::find($user_id) : \Auth::user();

        if (is_object($user) && $user->trade_balance >= User::MINI_TRADE_BAL) {
            $user->active_bot_trade = User::AUTO_TRADER;
            $user->update();
            return redirect()->route('trader');
        }
        return redirect()->back()->with('status2', 'Trade balance must not be less than $' . number_format(User::MINI_TRADE_BAL) . " USDT");
    }

    public function transferFund(Request $request)
    {
        $x4d = x4default(X4Defaults::GENERAL_SYSTEM_CONFIG_SLUG);
        if (is_object($x4d)) {
            $trader_status = $x4d->data->trader_status;
            if ($trader_status === X4Defaults::NOT_ACTIVE_STATUS) {
                return redirect()
                    ->back()
                    ->with('status2', "TraderBot is currently undergoing maintenance.");

            }
        }

        $coin_slug = $request->input('coin_slug');
        $amount_fiat = $request->input('amount');
        $coin_qty = $request->input('send_qty');
        $destination = $request->input('destination');
        $user = \Auth::user();


        $coin_info_controller = new CoinInfoController();
        $coin_infor = $coin_info_controller->getCoinInfo('', $coin_slug);
        $trade_coin_info = $coin_info_controller->getCoinInfo("", Trader::TRADE_RETURN_COIN);
        $coin_balance_controller = new CoinsBalanceController();
        $update = $coin_balance_controller->updateCoinBalance($user->id, $coin_slug, -$coin_qty);

        if (!$update) {
            return redirect()->back()->with('status2', 'Insufficient fund in wallet balance to fund trade account.');
        }
        if (is_object($coin_infor)) {
            if ($coin_slug == Trader::TRADE_RETURN_COIN) {
                $convert_to_trade_coin = $coin_qty;
            } else {
                $fiat_amount = $coin_infor->price * $coin_qty;
                $convert_to_trade_coin = $fiat_amount / $trade_coin_info->price;

            }
            $user->trade_balance += $convert_to_trade_coin;
            $user->update();
            return redirect()->back()->with('status', 'Trade balance updated');
        }
        return redirect()->back()->with('status2', 'Unable to proceed, try again');

    }

    public function CalculateTraderProfit(Request $request, $user_id, $data = [])
    {
        $user = User::find($user_id);
        $market_controller = new MarketController();
        $get_market_value = $market_controller->getRandomMarketPair();


        if ($user->trade_balance < 0) {
            return false;
        }
        $x4_defaults = x4default(\App\Trader::BOT_IDENTIFIER, $user->id);
        $interval = $x4_defaults->data->return_interval;

//        if(is_object($x4_defaults) && !empty($interval)) {
        $timely_return = $x4_defaults->data->{$interval};
        $number_generator = $timely_return;
//        }else {
//            $number_generator = (mt_rand(0.145 * 10, 0.334 * 10) / 10) * 100;
//        }

        $analyzed = $this->traderBotAnalyzer($user->id, $number_generator);

        $profit = $data['profit'] ?? floatval($analyzed);

        if ($user->total_referrals > 0) {
            $bonus = ($profit * Trader::INVITE_PERCENTAGE) * $user->total_referrals;
            $invite_profit = $profit > 0 ? $bonus : 0.00;

            //update log
            $data = [
                "user_id" => $user->id,
                "coin_qty" => $bonus,
                'coin_slug' => Trader::TRADE_RETURN_COIN,
            ];
            $this->updateRefBonusNotify($request, $data);
        } else {
            $invite_profit = 0.0;
        }


        $explode = explode('_', $get_market_value->symbol);
        $coin_info_controller = new CoinInfoController();
        $coin_info = $coin_info_controller->getCoinInfo('', Trader::TRADE_RETURN_COIN);


        $trader = new Trader();
        $trader->user_id = $user->id;
        $trader->amount = $user->trade_balance;
        $trader->crypto_traded = $explode[0];
        $trader->total_profit = $profit / $coin_info->price;
        $trader->invite_profit = $invite_profit / $coin_info->price;
        $trader->pair = $get_market_value->displayName;
        $trader->exchange = $this->getMarketData($get_market_value->symbol);
        $trader->trade_crypto = $explode[1];
        $trader->trade_time = Carbon::now();
        $trader->trade_type = $this->tradeSideType($get_market_value->symbol);
        $trader->status = Trader::ACTIVE;
        $trader->refcode = rand(94394, 100000);
        $trader->type = "profit";
        $trader->save();

        $amount = $profit + $invite_profit;
        //update user balance
        $this->updateTradeBalance($amount, $user->id);


        return true;
    }

    public function getRecentOrders($user_id)
    {
        $trades = Trader::where('user_id', $user_id)
            ->limit(20)
            ->orderBy('id', 'desc')
            ->get();
        return TraderResource::collection($trades);
    }

    public function updateTradeBalance($amount, $user_id)
    {
        $user = User::find($user_id);
        if (is_object($user)) {
            $format_amount = (float) number_format($amount, 8);
            $user->trade_balance +=  $format_amount;
            $user->trade_profit +=  $format_amount;
            return $user->update();
//            dd($user->trade_profit, $format_amount, $user);

        }
//        return false;
    }

    public function getMarketData($pair)
    {

        try {
            $call = requestcall("GET", "https://api.poloniex.com/markets/" . $pair . "/markPriceComponents");
            $components = $call->components;
            $rand = rand(0, count($components) - 1);
            return $components[$rand]->exchange ?? $this->getMarketData($pair);
        } catch (\Exception $e) {
            Log::debug($e->getTraceAsString());
        }
        return "BINANCE";
    }

    public function traderBotAnalyzer($user_id, $potential_profit)
    {

        $trade_loss = Trader::where('user_id', $user_id)
            ->where('total_profit', '<', 0)
            ->orderBy('id', 'Desc')
            ->get();
        $trade_gains = Trader::where('user_id', $user_id)
            ->where('total_profit', '>', 0)
            ->get();

        if ((count($trade_gains) == 0 && count($trade_loss) == 0))
            return $potential_profit;

        if (count($trade_gains) >= (count($trade_loss) * rand(4, 6))) {
            return "-" . $potential_profit;

        } else {
            return $potential_profit;

        }
    }

    public function tradeSideType($pair)
    {
        try {
            $call = requestcall("GET", "https://api.poloniex.com/markets/".$pair."/trades");
            $rand = !empty($call) ? rand(0, count($call) - 1): null;
            return (!empty($rand) ? (strtolower($call[$rand]->takerSide) === "buy" ? "ask" : "bid") : 'ask');

        } catch (\Exception $e) {
            Log::debug($e->getTraceAsString());
        }
        return "bid";
    }

    public function exchangeManager($type = null, $user_id = null)
    {
        $user = User::find($user_id);
        $pair = "BTC_USDT";
        try {
            $call = requestcall("GET", "https://api.poloniex.com/markets/" . $pair . "/trades");
            $rand = rand(0, count($call) - 1);

            return successResponse('exchange data',
                [
                    'result' => $call[$rand],
                    'trade_balance' => round($user->trade_balance, 5),
                    'crypto_bal' => round($user->trade_balance / $call[$rand]->price, 4) . " BTC"
                ]);

//            return strtolower($call[$rand]->takerSide) === "buy" ? "ask" : "bid";

        } catch (\Exception $e) {
            Log::debug($e->getTraceAsString());
        }
        return errorResponse('unable to fetch values');
    }

    public function exchangeHistory()
    {
        return view('appV2.history');
    }

    public function getOrder($txnID)
    {
        $order = Trader::where('refcode', $txnID)->first();
        return successResponse("Order result", $order);
    }

    public function getTradeOrders($user_id)
    {
        $orders = Trader::where('status', Trader::ACTIVE)->orderBy('id', 'desc')->limit(20)->get();
        return TraderResource::collection($orders);
    }

    public function updateRefBonusNotify(Request $request, $data = [])
    {

        $coin_slug = $data['coin_slug'];
        $coin_qty = $data['coin_qty'];
        $user_id = $data['user_id'];
        $description = "referral bonus received";
        $receiver_wallet_address = "";
        $trns = "";
        $transaction = new TransactionsController();
        $transaction->RequestToArray($request, 'bonus', '', $coin_slug, $coin_qty, '', $user_id, Transactions::ACTIVE, $description, $receiver_wallet_address, $trns);

        $user = User::find($user_id);
        $user->referral_bonus += $coin_qty;
        $user->update();

        $coin_balance_controller = new CoinsBalanceController();
        return $coin_balance_controller->updateCoinBalance($user_id, $coin_slug, $coin_qty);

    }

    public function transferWallet(Request $request)
    {
        $x4d = x4default(X4Defaults::GENERAL_SYSTEM_CONFIG_SLUG);
        if (is_object($x4d)) {
            $trader_status = $x4d->data->trader_status;
            if ($trader_status === X4Defaults::NOT_ACTIVE_STATUS) {
                return errorResponse("TraderBot is currently undergoing maintenance.");
            }
        }

        $amount_crypto = $request->get('amount_crypto');
        $amount_fiat = $request->get('amount_fiat');
        $coin_slug = $request->get('coin_slug');
        $usr_id = (int)$request->input('usr_id');
        //convert fiat amount to usdt
        $coin_info_contr = new CoinInfoController();
        $coin_info = $coin_info_contr->getCoinInfo('', Trader::TRADE_RETURN_COIN);
        $usdt_fiat_amount = $amount_fiat / $coin_info->price;

        //charge
        $data = [
            'coin_slug' => $coin_slug,
            'coin_qty' => $amount_crypto,
            'user_id' => $usr_id,
            'percentage' => Trader::WITHDRAWAL_FEE,
            'service_paid' => 'trade-withdrawal',
            'currency' => "USD",
            'reference_id' => md5(time())
        ];

        //charge client for withdrawal
        $fees_controller = new FeesController();
        $fee = $fees_controller->save($request, $data);
        //convert fee to usdt
        $fee_to_fiat = $fee / $coin_info->price;


        $user = User::find($usr_id);
        if (!is_object($user))
            return errorResponse("Invalid user id" . $coin_slug);

        $available_bal = $user->trade_balance - ($user->trade_balance * 0.05);


        if ($available_bal >= $usdt_fiat_amount) {

            //log and notify
            $transaction_controller = new TransactionsController();
            $transaction_controller->RequestToArray($request, 'transfer', '', $coin_slug, $amount_crypto, '', $usr_id, Transactions::ACTIVE, 'transfer fund to wallet', '', '');

            $coin_balance = new CoinsBalanceController();
            $update = $coin_balance->updateCoinBalance($usr_id, $coin_slug, $amount_crypto);
            if ($update) {
                $sub_fee = $usdt_fiat_amount - $fee_to_fiat;
                $user->trade_balance -= $sub_fee;
                $user->update();
                if ($user->trade_balance < 5000) {
                    $user->active_bot_trade = 0;
                    $user->update();
                }
            }
            return successResponse("Fund transferred to wallet.");

        }
        return errorResponse("insufficient fund in your trade balance");

    }

    public function changeBotStatus($user_id)
    {
        $user = User::find($user_id);
        if (!is_object($user))
            return errorResponse("invalid user request");
        if ($user->active_bot_trade === User::AUTO_TRADER) {
            $user->active_bot_trade = User::DEACTIVATE_AUTO_TRADER;
            $msg = "Bot trader shutdown for your trading account.";
        } else {
            $user->active_bot_trade = User::AUTO_TRADER;
            $msg = "Bot trader activated for your trading account.";
        }
        $user->update();
        return successResponse($msg);
    }

    public function getBotStatus($user_id)
    {
        $user = User::find($user_id);
        if (is_object($user))
            return successResponse("system status", ['status' => $user->active_bot_trade]);
        return errorResponse("no active user");
    }

    public function addTrade2X4(Request $request)
    {

        $name = "config_bot";
        $monthly_re = $request->input('monthly_return');
        $weekly_return = $request->input('weekly_return');
        $daily_re = $request->input('daily_return');
        $hourly_rate = $request->input('hourly_return');
        $return_inter = $request->input('return_interval');
        $user_id = $request->input('usr_id');
        $value = $request->input('x4default');
        $cusr_id = $request->input('cs_user_id');

        $x4_console = new X4DefaultsController();
        if (!empty($cusr_id)) {
            $data = [
                'name' => $name,
                "value" => $value."-".$cusr_id,
                'data' => [
                    'month_return' => $monthly_re,
                    'weekly_return' => $weekly_return,
                    'daily_return' => $daily_re,
                    'hourly_return' => $hourly_rate,
                    'return_interval' => $return_inter,
                    'cusr_id' => $cusr_id
                ],
                'admin_id' => $user_id,
            ];

            $console = $x4_console->convertDataToJSON($data);
        }else {
            $console = $x4_console->convertDataToJSON(
                [
                    'name' => $name,
                    "value" => $value,
                    'data' => [
                        'month_return' => $monthly_re,
                        'weekly_return' => $weekly_return,
                        'daily_return' => $daily_re,
                        'hourly_return' => $hourly_rate,
                        'return_interval' => $return_inter,
                    ],
                    'admin_id' => $user_id,
                ]);
        }
        return successResponse("TradeBot defaults have been changed to new values", [$console]);

    }

    public function manualTradeUpdate(Request $request)
    {

        $user_id = $request->input('user_id');
        $user = User::find($user_id);
//        if(is_object($user) && $user->active_bot_trade === User::AUTO_TRADER)
//        {
//            return redirect()->back()->with('status2', 'Unable to update trade, auto trader not activated for account');
//        }

        $trade_type = $request->input('trade_type');
        $trade_size = $request->input('trade_size');

        $data = ["profit" => $trade_type == "+" ? $trade_size : $trade_type . $trade_size];

        $update = $this->CalculateTraderProfit($request, $user_id, $data);

        if ($update) {
            return redirect()->back()->with('status', "Trade updated");
        }
        return redirect()->back()->with('status2', 'Unable to update trade');

    }

    public function listAdminTrades($user_id)
    {
        $user = User::find($user_id);
        $trades = Trader::where('user_id', $user_id)
            ->with('user')
            ->get();
        return view('appV1.admin.trader', [
            'trades' => $trades,
            "user" => $user
        ]);
    }


}
