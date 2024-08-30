<?php

namespace App\Http\Controllers;

use App\Coins;
use App\Staking;
use App\Transactions;
use App\X4Defaults;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \Auth;

class StakingController extends Controller
{
    public function calcReturns(Request $request)
    {
        $coin_slug = $request->input('coin_slug');
        $coin_qty = $request->input('coin_qty');
        $coins = new CoinInfoController();
        $coincontrl = new CoinsController();

        $tokens = new TokenController();
        $get_token_coins = $tokens->getTokenCoinInfo($coin_slug);

        if(is_object($get_token_coins)){

            if($coin_qty >= $get_token_coins->threshold) {
                $coin_to_fiat = $coin_qty * $get_token_coins->price;
                $daily_percentage = (($get_token_coins->apy / 100) / Staking::YEARLY);
                $monthly_percentage = ($get_token_coins->apy / 100) / 12;

                $yearly_return = $coin_to_fiat + ($coin_to_fiat * ($get_token_coins->apy / 100));

                $daily_return = $coin_to_fiat + ($coin_to_fiat * $daily_percentage);
                $monthly_return = $coin_to_fiat + ($monthly_percentage * $coin_to_fiat);

                return [
                    'status' => true,
                    'image_url' => env('CRYPTO_COMPARE_URL') . $get_token_coins->thumbnail,
                    'monthly_return_fiat' => $monthly_return,
                    'daily_return_fiat' => round($daily_return, 4),
                    'daily_return_crypto' => round($daily_return / $get_token_coins->price, 4),
                    'monthly_return_crypto' => round($monthly_return / $get_token_coins->price, 4),
                    'yearly_return_crypto' => round($yearly_return / $get_token_coins->price, 4),
                    'apr' => $get_token_coins->apy,
                    'coin_name' => $get_token_coins->caption

                ];
            }else{
                return ['status' => false, 'msg' => "Minimum ".$get_token_coins->slug." threshold for staking is ".$get_token_coins->threshold.''.$get_token_coins->slug.'.'];

            }

        }
        elseif($coincontrl->isCoinExists(null, $coin_slug)) {

            $coin_info = $coins->getCoinInfo(0, $coin_slug);

            $coin_to_fiat = $coin_qty * $coin_info->price;

            $coindetail = $coincontrl->getCoin($coin_slug);
            if($coin_qty >= $coindetail->threshold) {

                $daily_percentage = (($coindetail->apr / 100) / (12 * 30) );
                $monthly_percentage = ($coindetail->apr / 100) / (12 * 4);
                $yearly_return = $coin_to_fiat + ($coin_to_fiat * ($coindetail->apr / 100));

                $daily_return = $coin_to_fiat + ($coin_to_fiat * $daily_percentage);
                $monthly_return = $coin_to_fiat + ($monthly_percentage * $coin_to_fiat);


                return [
                    'status' => true,
                    'image_url' => env('CRYPTO_COMPARE_URL').$coin_info->image_url,
                    'monthly_return_fiat' => $monthly_return,
                    'daily_return_fiat' => round($daily_return, 4),
                    'daily_return_crypto' => round($daily_return / $coin_info->price, 4),
                    'monthly_return_crypto' => round($monthly_return / $coin_info->price, 4),
                    'yearly_return_crypto' => round($yearly_return / $coin_info->price, 4),
                    'apr' => $coindetail->apr,
                    'coin_name' => $coindetail->coin_name

                ];
            }else{
                return ['status' => false, 'msg' => "Minimum ".$coindetail->coin_name." threshold for staking is ".$coindetail->threshold.''.$coindetail->coin_slug.'.'];
            }
        }
        return ['status' => false, 'msg' => "Unable to continue"];

    }
    public function saveStake(Request $request)
    {
        $coin_slug = $request->input('coin_slug');

        $x4default = x4default(X4Defaults::GENERAL_SYSTEM_CONFIG_SLUG);
        if(is_object($x4default)) {
            $staking_status = $x4default->data->staking_status;
            if ($staking_status === X4Defaults::NOT_ACTIVE_STATUS) {
                return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'message' => 'Staking is currently under maintenance']);
            }
        }
        $stake = new Staking();

        $transaction = new TransactionsController();
        $coin_balance = new CoinsBalanceController();
        $coin = new CoinsController();
        $token = new TokenController();


        $stake->user_id = $request->user()->id;
        $stake->coin_qty = $request->input('coin_qty');
        $stake->duration = Staking::DURATION;


        if($coin->isCoinExists(null, $coin_slug)) {

            $coin_detail = $coin->getCoin($coin_slug);
            $coin_info = new CoinInfoController();
            $coin_rate_info = $coin_info->getCoinInfo($coin_detail->id);

            $stake->coin_id = $coin_detail->id;
            $stake->coin_info_id = $coin_rate_info->id;
            $stake->apr = $coin_detail->apr;

            $update_balance = $coin_balance->updateCoinBalance($stake->user_id, $coin_slug, -$stake->coin_qty);
            if ($stake->coin_qty >= $coin_detail->threshold) {
                if ($update_balance) {

                    $stake->status = Staking::ACTIVE;
                    //log
                    $transaction->RequestToArray($request, 'stake', '', $coin_slug, $stake->coin_qty, '', $stake->user_id, Transactions::ACTIVE);
                    $stake->save();
                    return \request()->json(Response::HTTP_OK, ['status' => true, 'message' => 'saved']);
                }
                return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'message' => 'Insufficient fund to proceed']);
            } else {
                return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'message' => "Minimum " . $coin_detail->coin_name . " threshold is " . $coin_detail->threshold . '' . $coin_detail->coin_slug . '.']);

            }
        }elseif($token->isTokenExists(null, $coin_slug)){
            $token_details = $token->getTokenCoinInfo($coin_slug);
            $stake->coin_id = $token_details->id;
            $stake->apr = $token_details->apy;
            $stake->type = "token";
            $update_bal = $coin_balance->updateCoinBalance($stake->user_id, $coin_slug, -$stake->coin_qty);
            if($update_bal)
            {
                $transaction->RequestToArray($request, 'stake', '', $coin_slug, $stake->coin_qty, '', $stake->user_id, Transactions::ACTIVE);

                $stake->status = Staking::ACTIVE;
                $stake->save();
                return \request()->json(Response::HTTP_OK, ['status' => true, 'message' => 'saved']);
            }
            return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'message' => 'Insufficient fund to proceed' ]);

        }

        return \request()->json(Response::HTTP_NOT_FOUND, ['status' => false, 'message' => 'Unable to proceed']);


    }

    public function listStakeCoins()
    {
        $transaction = new TransactionsController();
        $staked_coins = $transaction->getTransaction(Auth::user()->id, 'stake');

        return view('appV1.dashboard.staked_coins', ['staked_coins' => $staked_coins]);
    }

    public function unStake(Request $request, $trans_id)
    {
        $transaction_id = $trans_id;

        $transaction = Transactions::where('trans_id', $transaction_id)->first();
        if(is_object($transaction)){
            $returns = new ReturnsController();
            $coin_info = new CoinInfoController();
            $coin_balances = new CoinsBalanceController();
            $tokens = new TokenController();
            $token_wallet = new TokenWalletController();




            if($transaction->comment == "token_stake"){
                $token_info = $tokens->getTokenCoinInfo('', $transaction->coin_id);
                $coin_info_details = $token_info;
                $coin_slug = $coin_info_details->slug;

            }else {

                $coin_info_details = $coin_info->getCoinInfo($transaction->coin_id);
                $coin_slug = $transaction->coin->coin_slug;
            }

            $accumulated_profits = $returns->getActiveReturns($transaction->trans_id, $transaction->user_id);
//            dd($accumulated_profits, $transaction->trans_id);

            if($accumulated_profits >= 0){
                //recalculate
                $profit_in_crypto = $accumulated_profits / $coin_info_details->price;
                //calc fee
                $data = [
                    'coin_slug' => $coin_slug,
                    'coin_qty' => $profit_in_crypto,
                    'user_id' => $transaction->user_id,
                    'percentage' => Staking::UNSTAKE_FEE,
                    'service_paid' => 'unstake',
                    'currency' => "USD",
                    'reference_id' => $transaction->trans_id
                ];

                $fee_controller = new FeesController();
                $fee = $fee_controller->save($request, $data);

                $fee_to_crypto = $fee / $coin_info_details->price;

                //charge
                $profit_after_fee = $profit_in_crypto - $fee_to_crypto;

                $capital_profit_sum = $transaction->coin_qty + ($profit_after_fee);

                $update_coin_balance = $coin_balances->updateCoinBalance($transaction->user_id, $coin_slug, $capital_profit_sum);
                if($update_coin_balance)
                {
                    $transaction->status = Transactions::CANCELLED;
                    $transaction->update();
                    //close withdrawn returns
                    $returns->closeReturn($transaction->trans_id, $transaction->user_id);
                    return redirect()->back()->with('status', 'Coin un-staked successfully and profit added to your balance.');
                }
            }
        }
        return redirect()->back()->with('status2', 'Unable to perform operation try again or contact system administrator');
    }

    public function reCalculateProfit($stake_id){

    }

}
