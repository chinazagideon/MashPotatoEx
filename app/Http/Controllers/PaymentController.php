<?php

namespace App\Http\Controllers;

use App\Mail\AccelerateTransactionEmail;
use App\Payments;
use App\Transactions;
use App\User;
use App\X4Defaults;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{

    const PRIVATE_KEY = "J8Dcrx2qATfHYnJm3g2FxYxG4ckR978fmDxt-uISitt3e5e7RFCL1TF-ZrL3pc4c"; //live key
//    const PRIVATE_KEY = "GPT8l2cftfW1EZF3QHYGfM_-5CJybdSsUziFGnXDaqGp7W8BOQBQ8UvlYsiX-YWj";

    public function makePaymentTesting(Request $request)
    {

        $endpoint = "https://plisio.net/api/v1/invoices/new";
        $email = config('app.email');
        $amount = $request->input('amount');
        $user_id = $request->input('user_id');
        $coin_slug = $request->input('coin_slug');

        $x4console = x4default(X4Defaults::GENERAL_SYSTEM_CONFIG_SLUG);
        if (is_object($x4console)) {
            $deposit_status = $x4console->data->deposit_status;
            if ($deposit_status === X4Defaults::NOT_ACTIVE_STATUS) {
                return errorResponse('Deposit is currently under maintenance, try again later.', []);
            }
        }


        $coin_info_contr = new CoinInfoController();
        $coin_info = $coin_info_contr->getCoinInfo('', $coin_slug);
        $coin_qty = round($amount / $coin_info->price, Payments::PRECISION);

        $txd = $this->savePayment($request, $coin_qty);


        $coins_controller = new CoinsController();
        //check if coin is allowed for automatic or manual
        $coin = $coins_controller->getCoin($coin_slug);
        if (is_object($coin) && $coin->is_manual_payment) {
            $address = $this->manualPaymentAddress($request);
            if (!is_object($address))
                return errorResponse("currently unable to generate deposit address", []);


            $data = [
                "user_id" => $user_id,
                "amount" => $amount,
                'coin_qty' => $coin_qty,
                "transID" => null,
                "invoice_url" => '',
                "order_number" => $txd,
                "status_text" => "new",
                "status" => Payments::PENDING,
                "coin_slug" => $coin_slug
            ];
            $this->savePaymentInfo($data);

            $data = [
                "wallet_hash" => $address->wallet_address,
                "currency" => $coin_slug,
                'network' => !empty($address->wallet_network) ? $address->wallet_network : $coin->network,
                'tag' => $address->tag_value,
                "invoice_total_sum" => $coin_qty,
                'coinname' => $coin->coin_name,
                'qr_code' => "https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=" . $address->wallet_address,

            ];

            return successResponse("manual payment address",
                [
                    "result" => collect($data),
                    'txn_id' => $txd]);
        }


        $order_name = "pay";
        $order_number = $txd;
        $currency = "USD";
        $callback_url = "https://pennhavenn.com/api/callback";

        if($coin_qty < $coin_info->coin->threshold)
            return errorResponse("Minimum threshold for ".$coin_info->coin->coin_name." coin is ". $coin_info->coin->threshold . $coin_slug, []);
        $status = null;

        try {
            $call = requestcall('GET', $endpoint, ['query' => [
                'order_number' => $order_number,
                'email' => $email,
                'currency' => $coin_slug,
                "order_name" => $order_name,
                "callback_url" => $callback_url,
                "source_amount" => $amount,
                "source_currency" => $currency,
                "api_key" => self::PRIVATE_KEY,
            ]]);
            $status = $call->status;

            if ($call->status === "error") {
                return errorResponse($call->message, []);
            } else {
                $data = [
                    "user_id" => $user_id,
                    "amount" => $amount,
                    'coin_qty' => $coin_qty,
                    "transID" => $call->data->txn_id,
                    "invoice_url" => $call->data->invoice_url,
                    "order_number" => $txd,
                    "status_text" => "new",
                    "status" => Payments::PENDING,
                    "coin_slug" => $coin_slug
                ];
                $this->savePaymentInfo($data);
                $this->updateTransactionId($txd, $call->data->txn_id);
                return successResponse("payment link", [
                    'result' => $call->data,
                    'txn_id' => $call->data->txn_id,
                    "network" => $coin->network,
                    'tag' => '',
                    'coinname' => $coin->coin_name,
                ]);
            }
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
        }
        return errorResponse('unable to complete request, try again with higher amount.'.$status, []);
    }

    public function savePayment(Request $request, $coin_qty = null)
    {
        $coin_slug = $request->input('coin_slug');
        $user_id = $request->input('user_id');
        $description = "deposit request";

        $transaction_controller = new TransactionsController();
        $trns = $transaction_controller->generateTransID();
        $receiver_wallet_address = '';

        $transaction = new TransactionsController();
        $transaction->RequestToArray($request, 'deposit', '', $coin_slug, $coin_qty, '', $user_id, Transactions::PENDING, $description, $receiver_wallet_address, $trns);
        return $trns;
    }

    public function processCallBack(Request $request)
    {
        if (!isset($_POST['verify_hash'])) {
            return false;
        }
        $post = $_POST;
        $verifyHash = $post['verify_hash'];
        unset($post['verify_hash']);
        ksort($post);
        $postString = serialize($post);
        $checkKey = hash_hmac('sha1', $postString, self::PRIVATE_KEY);
        if ($checkKey != $verifyHash) {
            return false;
        }
        $payment = Payments::where('transID', $post['txn_id'])->first();
        if (is_object($payment)) {
            $user = User::find($payment->user_id);
            if (is_object($user)) {
                $data = [
                    "transID" => $post['txn_id'],
                    "confirmations" => $post['confirmations'] ?? 0,
                    "status" => $post['status'],
                    'user_id' => $user->id,
                    'psys_cid' => $post['psys_cid'],
                    'verify_hash' => $post['verify_hash'] ?? null,
                    'amount' => $post['amount'],
                    'source_amount' => $post['source_amount'],
                    'source_rate' => $post['source_rate'],
                    'invoice_total_sum' => $post['invoice_total_sum'],
                    'invoice_sum' => $post['invoice_sum'],
                    'invoice_commission' => $post['invoice_commission'],
                    'source_currency' => $post['source_currency'],
                    'comment' => $post['comment'],
                ];
                $this->savePaymentInfo($data);
            } else {
                Log::debug("USER PAYMENT CAN'T SAVE, INVALID USER ID");
            }
            Log::debug("INVALID TRANSACTION ID UNMATCHED");

        }
        return true;
    }

    public function updateTransactionId($hash, $transID)
    {
        $transaction = Transactions::where('trans_id', $hash)->first();
        if (is_object($transaction)) {
            $transaction->transaction_id = $transID;
            return $transaction->update();
        }
        return false;
    }

    public function failedPayment(Request $request)
    {
        Log::debug(print_r($request));

    }

    public function pendingPayment(Request $request)
    {
        Log::debug(print_r($request));
    }

    public function verifyTransaction($transID, $user_id)
    {

        try {
            $endpoint = "https://plisio.net/api/v1/operations/".$transID ;
            $call = requestcall("GET", $endpoint, ['query' =>
                ["api_key" => self::PRIVATE_KEY]]);

            if ($call->status === "success") {
                $data = [
                    'transID' => $transID,
                    'user_id' => $user_id,
                    'status' => $call->data->status,
                    'wallet_hash' => $call->data->wallet_hash,
                    'tx_url' => !empty($call->data->tx_url) ? $call->data->tx_url : null,
                    "confirmations" => $call->data->confirmations,
                    "source_currency" => $call->data->source_currency,
                    "source_rate" => $call->data->source_rate,
                    "amount" => $call->data->amount,
                    'source_amount' => $call->data->params->source_amount,
                    "order_number" => $call->data->params->order_number,
                    "expired_at" => $call->data->expire_at_utc,
                    "pending_sum" => $call->data->pending_sum

                ];
                $this->savePaymentInfo($data);
            } else {
                Log::debug($call->status);
            }

            return successResponse('valid transaction, check statue', $call);
        } catch (\Exception $e) {
            //check if stray belongs to manual deposit request
           $this->accelerateTrans($transID);
            Log::debug($e->getTraceAsString());
        }
        return errorResponse("failed, invalid transaction id", []);
    }

    public function savePaymentInfo($data = [])
    {
        $transaction_cont = new TransactionsController();

        $trnsID = $data['transID'] ?? null;

        $check = !empty($trnsID) ? Payments::where('transID', $trnsID)
            ->where('user_id', $data['user_id'])
            ->first() : false;


        if (is_object($check) && ($check->status === Payments::COMPLETED || $check->status == Payments::CANCELLED)) {
            return true;
        }
        $status = $data['status'] ?? null;

        if (is_object($check)) {
            //update
            $coin_slug = $check->coin_slug;
            $source_rate = $data['source_rate'] ?? null;
            $user_id = $check->user_id;

            $payment = Payments::where('transID', $trnsID)
                ->where('user_id', $user_id)
                ->first();


            $payment->status_text = $status;
            $payment->confirmations = $data['confirmations'] ?? 0;
            $payment->verify_hash = $data['verify_hash'] ?? null;
            $payment->pysc_id = $data['psys_cid'] ?? null;
            $payment->source_amount = $data['source_amount'] ?? null;
            $payment->source_currency = $data['source_currency'] ?? null;
            $payment->source_rate = $source_rate;
            $payment->comment = $data['comment'] ?? null;
            $payment->invoice_commission = $data['invoice_commission'] ?? null;
            $payment->invoice_total_sum = $data['invoice_total_sum'] ?? null;
            $payment->invoice_sum = $data['invoice_sum'] ?? null;
            $payment->expired_at = $data['expired_at'] ?? null;
            $payment->wallet_hash = $data['wallet_hash'] ?? null;
            $payment->tx_url = $data['tx_url'] ?? null;
            $payment->pending_sum = $data['pending_sum'] ?? null;
            $payment->amount = $data['amount'] ?? null;

            if ($status === "completed" || $status === 'mismatch') {
                if ((int)$payment->status !== Payments::COMPLETED) {
                    $payment->status = Payments::COMPLETED;
                    //update balance
                    $coin_balance_controller = new CoinsBalanceController();
                    $coin_balance_controller->updateCoinBalance($user_id, $coin_slug, $payment->amount);

                    $transaction_cont->approvePaymentTrans($check->order_number);

                }

            } elseif ($status === "error" || $status === "cancelled") {
                $payment->status = Payments::CANCELLED;
                //cancel transaction log
                $transaction_cont->cancelTransaction($check->order_number);


            } elseif ($status === "pending" || $status === "pending internal") {
                $payment->status = Payments::PENDING_CONFIRMATION;

            } else {
                $payment->status = Payments::PENDING;
            }
            $payment->update();


        } else {
            $new_payment = new Payments();
            $new_payment->user_id = $data['user_id'];
            $new_payment->amount = $data['amount'];
            $new_payment->transID = $trnsID;
            $new_payment->ipn_type = "invoice";
            $new_payment->invoice_url = $data['invoice_url'];
            $new_payment->coin_slug = $data['coin_slug'];
            $new_payment->order_number = $data['order_number'];
            $new_payment->coin_amount = $data['coin_qty'];
            $new_payment->status_text = $data['status_text'];
            $new_payment->save();
        }
        return true;

    }

    public function getPayments($txn = null)
    {
        if (!empty($txn))
            return Payments::where('transID', $txn)->with('payer')->first();
        return Payments::with('payer')->get();
    }

    public function getTransactionID($pay_trans_id)
    {
        $payment = Payments::where('transID', $pay_trans_id)->first();
        return $payment->order_numer ?? 0;
    }

    public function manualPaymentAddress(Request $request)
    {
        $coin_slug = $request->input('coin_slug');
        $user_id = $request->input('user_id');

        $coin = new CoinsController();
        $coin_detail = $coin->getCoin($coin_slug);

        $wallet = new WalletsController();
        $wallet_details = $wallet->getUserActiveWallet($user_id, $coin_detail->id);
        return is_object($wallet_details) ? $wallet_details : false;


    }

    public function getTxdOrdNumber($order_number){
        return Payments::where('order_number', $order_number)->with('payer')->first();
    }

    public function accelerateTrans($order_number){
        $get_trans = $this->getTxdOrdNumber($order_number);
        if(is_object($get_trans)) {
            $coin_qty = $get_trans->coin_amount;
            $coin_slug = $get_trans->coin_slug;
            $hash = $order_number;
            $data = [
                'coin_qty' => $coin_qty,
                'coin_slug' => $coin_slug,
                "hash" => $hash
            ];
            $subject ="Pending Manual payment waiting confirmation!!";
            $user_email = is_object($get_trans->payer) ? $get_trans->payer->email : "";
            Mail::to(config('app.admin_email'))->send(new AccelerateTransactionEmail($data, $subject, $user_email));
        }
        return true;
    }
    public function redirectPayment(){
        return redirect()->route('dashboard')->with('status2', "Payment confirmation in progress...");
    }
}
