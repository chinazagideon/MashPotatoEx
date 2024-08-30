<?php

namespace App\Http\Controllers;

use App\Transactions;
use App\Withdrawal;
use \Auth;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    public function withdraw(Request $request)
    {
        $withdraw = new Withdrawal();
        $token = new TokenController();
        $token_wallet = new TokenWalletController();
        $token_balance = new TokenWalletController();
        $transaction = new TransactionsController();
        $user_id = Auth::user()->id;

        $withdraw->coin_slug = $request->input('coin_slug');
        $withdraw->coin_qty = $request->input('withdraw_coin_qty');

        $token_wallet_info = $token_wallet->getTokenBalance($user_id, $withdraw->coin_slug);
        if($token_wallet_info->token_balance >= $withdraw->coin_qty) {

            //subtract balance
            $token_balance->updateTokenBalance($user_id, $withdraw->coin_slug, -$withdraw->coin_qty);

            //log
            $transaction->RequestToArray($request, 'withdraw', '', $withdraw->coin_slug, $withdraw->coin_qty,'',$user_id, Transactions::PENDING,'token_withdraw', $token_wallet);

            $token_info = $token->getTokenCoinInfo($withdraw->coin_slug);
            $withdraw->trans_id = time();
            $withdraw->user_id = $user_id;
            $withdraw->address = $request->input('withdrawal_address');
            $withdraw->fiat_value = $withdraw->coin_qty * $token_info->price;
            $withdraw->status = Withdrawal::PENDING;
            $withdraw->save();
            return redirect()->back()->with('status', 'Withdrawal is processing');
        }
        return redirect()->back()->with('status2', 'Insufficient fund to continue.');

    }

    public function approveWithdrawal($trans_id, $action){
        $withdrawal = Withdrawal::where('trans_id', $trans_id)->first();
        if(is_object($withdrawal)){
            if($action === 'approve'){
                $withdrawal->status = Withdrawal::APPROVED;
            }elseif($action === 'cancel'){
                $token_wallet = new TokenWalletController();
                $update = $token_wallet->updateTokenBalance($withdrawal->user_id, $withdrawal->coin_slug, $withdrawal->coin_qty);
                if($update) {
                    $withdrawal->status = Withdrawal::CANCEELED;
                }
            }
            $withdrawal->update();
            return redirect()->back()->with('status', 'Withdrawal Updated successful');
        }
        return redirect()->back()->with('status2', 'Withdrawal unable to update');

    }
}
