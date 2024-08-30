<?php

namespace App\Http\Controllers;

use App\CoinSwap;
use App\Transactions;
use App\X4Defaults;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CoinSwapController extends Controller
{
    public function sendSwapCoinToBalance(){

    }
    public function swapCoin(Request $request)
    {
        $swap = new CoinSwap();


    }

    public function calculateSwap(Request $request)
    {
        $coin_info = new CoinInfoController();

        $from_coin_name = $request->input('from_coin_name');
        $to_coin_name = $request->input('to_coin_name');
        $to_coin_qty = $request->input('to_coin_qty');
        $from_coin_qty = $request->input('from_coin_qty');

        $to_coin_details = $coin_info->getCoinInfo('', $to_coin_name);
        $to_coin_price = $to_coin_details->price;



        $from_coin_details = $coin_info->getCoinInfo('', $from_coin_name);
        //swap COIN-1 for COIN-2
        if($from_coin_qty > 0)
        {
            $from_coin_fiat = $from_coin_qty * $from_coin_details->price;
            $to_coin_qty = $from_coin_fiat / $to_coin_price;
            return [
                'to_qty' => round($to_coin_qty,4),
                'to_current_price' => $to_coin_price,
                'from_current_price' => $from_coin_details->price,
                ];
        }else
        {
            return [''];
        }
    }

    public function saveSwap(Request $request){

        $swap = new CoinSwap();
        $transaction = new TransactionsController();
        $x4 = x4default(X4Defaults::GENERAL_SYSTEM_CONFIG_SLUG);
        if(is_object($x4))
        {
            $swap_status = $x4->data->swap_status;
            if($swap_status === X4Defaults::NOT_ACTIVE_STATUS){
                return redirect()->back()->with('status2', 'Staking is currently under maintenance');
            }
        }
        $coin_slug = $request->input('from_coin_slug');
        $coin_slug_2 = $request->input('to_coin_slug');
        $coins = new CoinsController();

        $coin_detail_1 = $coins->getCoin($coin_slug);
        $coin_detail_2 = $coins->getCoin($coin_slug_2);
        $swap->user_id = $request->user()->id;
        $swap->coin_id = $coin_detail_1->id;
        $swap->coin_qty = $request->input('from_coin_qty');
        $swap->swap_coin_id = $coin_detail_2->id;
        $swap->swap_coin_qty = $request->input('to_coin_qty');


        //subtract
        $coinbalance = new CoinsBalanceController();
        $balance = $coinbalance->getUserCoinBalance($swap->user_id, $coin_slug);
        if($balance >= $swap->coin_qty)
        {
              //calculate swap subtract fee & get value to add
               $swap_coin_qty = $this->performSwapCoin($request);
               if((bool) !$swap_coin_qty){
                   return redirect()->back()->with('status2', 'Unable to swap coin, try again');
               }

            //subtract swap A coin
            $coinbalance->updateCoinBalance($swap->user_id, $coin_slug, -$swap->coin_qty);
//            add swapB coin
            $coinbalance->updateCoinBalance($swap->user_id, $coin_slug_2, $swap->swap_coin_qty);
            $swap->status = CoinSwap::APPROVED;


            //log
            $transaction->RequestToArray($request, 'swap', $swap->swap_coin_qty, $coin_slug, $swap->coin_qty, $coin_slug_2, '', Transactions::ACTIVE);
            $swap->save();

            //log fee
            $fee_controller = new FeesController();
            $data = [
                "coin_slug" => $coin_slug,
                "percentage" => $coin_detail_1->fee,
                'currency' => "USD",
                'service_paid' => 'swap',
                'user_id' => $swap->user_id,
                'coin_qty' => $swap->coin_qty,
                'reference_id' => $swap->id

            ];
            $fee_controller->save($request, $data);

            return redirect()->back()->with('status', 'Swap completed successfully!');
//            return \request()->json(Response::HTTP_OK, ['status' => true, 'message' => 'saved']);
        }

        return redirect()->back()->with('status2', 'Insufficient Balance to swap');
//        return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'message' => 'Insufficient Balance to swap ']);
    }

    public function performSwapCoin($request)
    {
        $coin_slug_qty = $request->input('from_coin_qty');

        //calculate swap
        $parse = new ParseJsonResponseController();
        $swap_coin_details = $parse->swapCoin($request);
        if ((bool) $swap_coin_details['status']) {
            $coin_slug_price = $swap_coin_details['swap_response']['coin_1_info']->price;
            $coin_slug_2_price = $swap_coin_details['swap_response']['coin_2_info']->price;

            $fee_percent = ($swap_coin_details['swap_response']['fee'] / 100);

            //convert to fiat
            $coin_1_qty_to_fiat = ($coin_slug_qty * $coin_slug_price);
            $coin_slug_1_fiat_value = $coin_1_qty_to_fiat - ($fee_percent * $coin_1_qty_to_fiat);

            //coin_2_qty to get
            $coin_2_qty = $coin_slug_1_fiat_value / $coin_slug_2_price;
            return $coin_2_qty;
        }
        return false;
    }

}
