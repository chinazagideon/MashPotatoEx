<?php

namespace App\Http\Controllers;

use App\Borrow;
use App\Transactions;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BorrowController extends Controller
{
    public function borrow(Request $request)
    {

    }

    public function calcBorrow(Request $request)
    {
        $coin_qty = $request->input('coin_qty');
        $coin_slug = $request->input('coin_slug');
        $collateral_coin_slug = $request->input('collateral_coin_slug');
        $coin_info = new CoinInfoController();
        $rate = $coin_info->getCoinInfo('', $coin_slug);
        $collateral_coin = $coin_info->getCoinInfo('', $collateral_coin_slug);


        if($coin_qty >= $rate->coin->threshold) {
            //convert coinQty to fiat
            $payback_coin_fiat = ($coin_qty * $rate->price) * Borrow::RATE;
            $collateral_coin_qty = $payback_coin_fiat / $collateral_coin->price;
            return [
                'collateral_coin_qty' => number_format($collateral_coin_qty,2),
                'collateral_coin_image' => env('CRYPTO_COMPARE_URL').$collateral_coin->image_url,
                'collateral_coin_rate' => $collateral_coin->price,
                'borrow_coin_image' => env('CRYPTO_COMPARE_URL').$rate->image_url,
                'borrow_coin_rate' => $rate->price
            ];
        }
        return false;
    }
    public function saveBorrow(Request $request)
    {
        $borrow = new Borrow();
        $coin_slug = $request->input('coin_slug');
        $coin_slug_2 = $request->input('collateral_coin_slug');

        $borrow->user_id = $request->user()->id;
        $borrow->coin_qty = $request->input('coin_qty');

        $coin = new CoinsController();
        $coin_info = new CoinInfoController();

        $coin_details = $coin->getCoin($coin_slug);
        $coin_details_2 = $coin->getCoin($coin_slug_2);

        $coin_rate_info = $coin_info->getCoinInfo($coin_details->id);

        $borrow->coin_id = $coin_details->id;
        $borrow->collateral_coin_id = $coin_details_2->id;

        $calc = $this->calcBorrow($request);
        $borrow->collateral_coin_qty = str_replace(',', '', $calc['collateral_coin_qty']);

        $borrow->coin_id_info = $coin_rate_info->id;

        $transaction = new TransactionsController();
        $borrow->status = Borrow::PENDING;

        $transaction->RequestToArray($request, 'borrow','', $coin_slug, $borrow->coin_qty, $coin_slug_2, $borrow->user_id, Transactions::PENDING);
        if($borrow->save()){
            return \request()->json(Response::HTTP_OK, ['status'=> true, 'message' => 'Request submitted successfully']);
        }else{
            return \request()->json(Response::HTTP_NOT_FOUND, ['status'=> false, 'message' => 'Application not successful, try again']);
        }

    }

    public function approveLoan($id, $action){
        $loan = Borrow::where('id', $id)->first();
        if(is_object($loan))
        {
            if($action === 'approve'){
                $coin = new CoinsController();
                $collateral_coin = $coin->getCoin(null, $loan->collateral_coin_id);
                $coin_balance = new CoinsBalanceController();
                $collateral_coin_balance = $coin_balance->getUserCoinBalance($loan->user_id, $collateral_coin->coin_slug);
                if($collateral_coin_balance >= $loan->collateral_coin_qty){
                    $update_collateral_balance = $coin_balance->updateCoinBalance($loan->user_id, $collateral_coin->coin_slug, -$loan->collateral_coin_qty);
                    if($update_collateral_balance){
                        $loan_coin = $coin->getCoin('', $loan->coin_id);

                        //update coin loaned
                        $loan_coin_balance = $coin_balance->updateCoinBalance($loan->user_id, $loan_coin->coin_slug, $loan->coin_qty);
                        if($loan_coin_balance){
                            $loan->approved_date = Carbon::today();
                            $loan->status = Borrow::ACTIVE;
                            $loan->update();
                            return redirect()->back()->with('status', 'Loan Application approved successfully');
                        }

                    }
                    return redirect()->back()->with('status2', 'Unable to approve');
                }else{
                    return redirect()->back()->with('status2', 'Collateral Balance is lower than required balance');
                }
            }elseif($action === 'cancel')
            {
                $loan->status = Borrow::CANCELLED;
                $loan->update();
                return redirect()->back()->with('status', 'Loan Application Cancelled');
            }

        }
        return redirect()->back()->with('status2', 'Unable to continue');
    }
}
