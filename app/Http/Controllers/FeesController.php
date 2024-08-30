<?php

namespace App\Http\Controllers;

use App\Fees;
use App\Transactions;
use App\User;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    public function save(Request $request, $data = [])
    {

        $coin_id =  $data['coin_id'] ?? 0;
        $coin_slug =  $data['coin_slug'] ?? null;
        $fiat_amount = $this->calculateFiatAmount($data['coin_qty'], $coin_slug, $coin_id);

        if($fiat_amount > 0) {
            $payable_fee = $fiat_amount * ($data['percentage'] / 100);

        $transaction = new TransactionsController();
        $transaction->RequestToArray($request, 'fee', $data['coin_qty'], $data['coin_slug'],
            $data['coin_qty'], null, $data['user_id'], Transactions::ACTIVE, $data['service_paid'].' transaction fee');


            $fees = new Fees();
            $fees->user_id = $data['user_id'];
            $fees->amount = $payable_fee;
            $fees->percentage = $data['percentage'];
            $fees->service_paid = $data['service_paid'];
            $fees->coin_slug = $coin_slug;
            $fees->coin_id = $coin_id;
            $fees->currency = $data['currency'];
            $fees->reference_id = $data['reference_id'];
            $fees->status = Fees::ACTIVE;
            $fees->save();
            return $payable_fee;
        }
        return null;
    }

    public function calculateFiatAmount($coin_qty, $coin_slug = null, $coin_id = 0){
        $coin_info_controller = new CoinInfoController();
        $coin_token_controller = new TokenController();

        $coin_info =  $coin_info_controller->getCoinInfo($coin_id, $coin_slug);
        $token_info = $coin_token_controller->getTokenCoinInfo($coin_slug, $coin_id);

        if(is_object($coin_info))
        {
            return $coin_info->price * $coin_qty;

        }elseif (is_object($token_info))
        {
            return $token_info->price * $coin_qty;
        }
        return false;

    }

    public function listAdminUserFees($user_id)
    {
        $user = User::find($user_id);
        $fees = Fees::where('user_id', $user_id)->get();
        $total_fees_paid = Fees::where('user_id', $user->id)->sum('amount');

        return view('appV1.admin.fees', [
            "fees" => $fees,
            "user"=> $user,
            'total_fees' => $total_fees_paid
        ]);
    }
}
