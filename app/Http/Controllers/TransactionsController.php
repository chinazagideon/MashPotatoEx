<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionsResource;
use App\Mail\TransactionAuth;
use App\Mail\TransactionMail;
use App\Mail\AdminNotification;
use App\Transactions;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use \Auth;

class TransactionsController extends Controller
{
    public function saveTransaction()
    {

    }

    public function getUserTransactions($user_id)
    {
        $transactions = Transactions::where('user_id', $user_id)->with('coin')->get();
        return $transactions;
    }

    public function RequestToArray(Request $request, $type, $ref_qty = 0, $coin_slug = null, $coin_qty = null, $coin_slug_2 = null, $user = null, $status = null, $descr = null, $address = null, $trans_id = null)
    {
        $coin_info = new CoinsController();
        $tokens = new TokenController();

        $req_coin_slug = $request->input('coin_slug');
        $req_coin_slug_2 = $request->input('coin_slug_2');

        $req_coin_qty = $request->input('coin_qty');
        if (empty($req_coin_qty)) {
            $coin_amount = $coin_qty;
        } else {
            $coin_amount = $req_coin_qty;
        }

        if (empty($req_coin_slug)) {
            $slug = $coin_slug;
        } else {
            $slug = $req_coin_slug;
        }

        if (!empty($request->user()->id)) {
            $user_id = $request->user()->id;
        } else {
            $user_id = $user;
        }

        if ($coin_info->isCoinExists(null, $slug)) {

            if (empty($req_coin_slug)) {
                $coin_detail = $coin_info->getCoin($coin_slug);

            } else {
                $coin_detail = $coin_info->getCoin($req_coin_slug);
            }


            if (empty($req_coin_slug_2)) {
                $coin_detail_2 = $coin_info->getCoin($coin_slug_2);
            } else {
                $coin_detail_2 = $coin_info->getCoin($req_coin_slug_2);
            }

            $array = $request->toArray();
            $data = [
                'coin_slug' => $slug,
                'type' => $type,
                'coin_id' => $coin_detail->id,
                'coin_qty' => $coin_amount,
                'coin_id_2' => is_object($coin_detail_2) ? $coin_detail_2->id : Null,
                'currency' => "USD",
                'comment' => $descr,
                'user_id' => $user_id,
                'reference_id_qty' => $ref_qty,
                'status' => !empty($status) && $status !== 0 ? Transactions::ACTIVE : $status,
                'address' => $address,
                'trans_id' => $trans_id
            ];
        } elseif ($tokens->isTokenExists(null, $slug)) {
            $token_info = $tokens->getTokenCoinInfo($slug);
            $data = [
                'coin_slug' => $slug,
                'type' => $type,
                'coin_id' => $token_info->id,
                'coin_qty' => $coin_amount,
                'coin_id_2' => null,
                'currency' => "USD",
                'comment' => "token_stake",
                'user_id' => $user_id,
                'reference_id_qty' => null,
                'status' => !empty($status) && $status !== 0 ? Transactions::ACTIVE : $status,
                'address' => $address,
                'trans_id' => $trans_id
            ];
        }

        return $this->saveLog($data);
    }

    public function saveLog($array = [])
    {
        $coin_info = new CoinInfoController();
        $transaction = new Transactions();
        $coins = new CoinsController();
        $tokens = new TokenController();

        $transaction->type = $array['type'];
        $transaction->coin_id = $array['coin_id'];
        $transaction->coin_qty = $array['coin_qty'];
        $transaction->reference_id = $array['coin_id_2'];
        $transaction->reference_id_qty = $array['reference_id_qty'];
        $transaction->fiat_currency = $array['currency'];
        $transaction->trans_id = isset($array['trans_id']) && !empty($array['trans_id']) ? $array['trans_id'] :  $this->generateTransID();

        $transaction->comment = $array['comment'];
        $transaction->user_id = $array['user_id'];
        $transaction->address = $array['address'];

        if ($coins->isCoinExists(null, $array['coin_slug'])) {
            $coin_detail = $coin_info->getActiveCoinInfo($transaction->coin_id);
            $transaction->fiat_amount = $this->convertToFiat($transaction->coin_qty, $transaction->coin_id);
            $transaction->coin_info_id = $coin_detail->id;
        } elseif ($tokens->isTokenExists(null, $array['coin_slug'])) {
            $token_info = $tokens->getTokenCoinInfo($array['coin_slug']);
            $transaction->fiat_amount = $transaction->coin_qty * $token_info->price;
            $transaction->coin_info_id = $token_info->id;
        }

        $transaction->status = $array['status'];
        $save = $transaction->save();
        if ($save) {
            try {
                //mail User
                Mail::to(User::find($transaction->user_id))->send(new TransactionMail($transaction));
                Mail::to(config('app.admin_email'))->send(new AdminNotification($transaction));
            }catch(\Exception $e){
                Log::debug($e->getTraceAsString());
            }
            return true;
        } else {
            return false;
        }

    }

    public function convertToFiat($coin_qty, $coin_id)
    {

        $coin_info = new CoinInfoController();
        $live_rate = $coin_info->getCoinInfo($coin_id);

        $fiat = $live_rate->price * $coin_qty;
        return $fiat;
    }

    public function generateTransID()
    {
        $time = md5(time());
        $validate = Transactions::where('trans_id', $time)->exists();
        if ($validate) {
            return $this->generateTransID();
        }
        return $time;
    }

    public function getTransaction($user_id, $type)
    {
        $transactions = Transactions::where('user_id', $user_id)->where('type', $type)->with('coin')->get();
        return $transactions;
    }

    public function listTransactions()
    {
        $transactions = Transactions::where('user_id', Auth::user()->id)->with('coin')->with('reference_coin')->get();
        return view('appV1.dashboard.transactions', ['transactions' => $transactions]);
    }

    public function allActiveTransactions($type = null)
    {
        if (!empty($type)) {
            return Transactions::where('status', Transactions::ACTIVE)->where('type', $type)->get();
        }
        return Transactions::where('status', Transactions::ACTIVE)->get();
    }

    public function approveTransaction($trans_id, $action)
    {
        $transaction = Transactions::where('trans_id', $trans_id)->first();
        if (is_object($transaction)) {
            $coin_balance = new CoinsBalanceController();
            $coin = new CoinsController();
            $coin_details = $coin->getCoin(null, $transaction->coin_id);

            if ($action === 'approve') {
                if ($transaction->type === "receive") {

                    $update = $coin_balance->updateCoinBalance($transaction->user_id, $coin_details->coin_slug, $transaction->coin_qty);
                    if ($update) {
                        $transaction->status = Transactions::ACTIVE;
                    }
                }
                if ($transaction->type === "send") {
                    $transaction->status = Transactions::ACTIVE;

                }
            } elseif ($action === 'cancel') {
//                $update = $coin_balance->updateCoinBalance($transaction->user_id, $coin_details->coin_slug, $transaction->coin_qty);
//                if ($update) {
                    $transaction->status = Transactions::CANCELLED;
//                }

            } else {
                $transaction->status = Transactions::PENDING;
            }
            $transaction->update();
            return redirect()->back()->with('status', 'Transaction updated successfully');
        }
        return redirect()->back()->with('status2', 'Transaction unable to continue');
    }

    public function updateReceive(Request $request)
    {
        $user_id = $request->input('user_id');
        $coin_id = $request->input('wallet_type');
        $wallet_address = $request->input('wallet_address');
        $coin_qty = $request->input('coin_qty');
        $coins = new CoinsController();
        $coin_balance = new CoinsBalanceController();


        $coin_details = $coins->getCoin(null, $coin_id);

        if (substr($coin_qty, 0, 1) === "-") {
            $update = $coin_balance->updateCoinBalance($user_id, $coin_details->coin_slug, -str_replace('-', '', $coin_qty));

        } else {
            $update = $coin_balance->updateCoinBalance($user_id, $coin_details->coin_slug, $coin_qty);

        }

        if ($update) {
            if (substr($coin_qty, 0, 1) === "-") {
                $data = [
                    'coin_slug' => $coin_details->coin_slug,
                    'type' => "send",
                    'coin_id' => $coin_id,
                    'coin_qty' => str_replace('-', '', $coin_qty),
                    'coin_id_2' => null,
                    'currency' => "USD",
                    'comment' => "",
                    'user_id' => $user_id,
                    'reference_id_qty' => "",
                    'status' => Transactions::ACTIVE,
                    'address' => $wallet_address
                ];
            } else {
                $data = [
                    'coin_slug' => $coin_details->coin_slug,
                    'type' => "receive",
                    'coin_id' => $coin_id,
                    'coin_qty' => $coin_qty,
                    'coin_id_2' => null,
                    'currency' => "USD",
                    'comment' => "",
                    'user_id' => $user_id,
                    'reference_id_qty' => "",
                    'status' => Transactions::ACTIVE,
                    'address' => $wallet_address
                ];
            }
            $this->saveLog($data);
            return redirect()->back()->with('status', 'Received transaction updated successfully');
        }

        return redirect()->back()->with('status2', 'Unable to update transaction');
    }

    public function transactionAuth($user_id)
    {
        $user = User::find($user_id);
        $code = $this->generateRand();
        $user->otp_code = $code;
        $user->update();
        try {
            Mail::to($user)->send(new TransactionAuth($user));
        } catch (\Exception $e) {
            Log::debug($e->getTraceAsString());
            return false;
        }

        return true;

    }

    public function generateRand()
    {
        $generate_code = random_int(100000, 999999);
        return strlen($generate_code) >= 6 ? $generate_code : $this->generateRand();
    }

    public function verifyPin($user_id, $otp_code)
    {
        $user = User::find($user_id);
        if (is_object($user)) {
            if (strcmp($user->otp_code, $otp_code) === 0) {
                $user->otp_code = null;
                $user->update();

                return true;
            }
        }
        return false;
    }
    public function cancelTransaction($trans_id){
        $transaction = Transactions::where('trans_id', $trans_id)->first();
        if(is_object($transaction)) {
            $transaction->status = Transactions::CANCELLED;
            $transaction->update();
        }
        return true;
    }

    public function approvePaymentTrans($trans_id){
        $transaction = Transactions::where('trans_id', $trans_id)->first();
        if(is_object($transaction)) {
            $user = User::find($transaction->user_id);
            Mail::to($user)->send(new TransactionMail($transaction));
            $transaction->status = Transactions::ACTIVE;
            $transaction->update();
        }
        return true;
    }

    public function getWalletTransactions($user_id){
        $search = null;
        $transactions = Transactions::where('user_id', $user_id)
            ->where(function($query) use ($search){
                $query->where('type', '=', 'send')
                    ->orWhere('type', '=', 'withdraw')
                    ->orWhere('type', '=', 'deposit')
                    ->orWhere('type', '=', 'receive');
            })
            ->with('coin')
            ->with('reference_coin')
            ->with('payment')
            ->get();

        return TransactionsResource::collection($transactions);

    }
}
