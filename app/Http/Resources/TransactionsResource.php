<?php

namespace App\Http\Resources;

use App\Transactions;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $status = null;
        $action = "";
        if ($this->status === Transactions::ACTIVE) {
            if (($this->type === "send" || $this->type === "withdrawal")) {
                $status = "Sent";
                $action = "Withdrawal";
            } else {
                $status = "Received";
                $action ="Deposit";
            }
        }elseif ($this->status === Transactions::CANCELLED){
            $status ="Cancelled";
            $action = "Cancelled";
        }else{
            if (($this->type === "send" || $this->type === "withdrawal")) {
                $status = "Sending";
            } else {
                $status = "Receiving";
            }
            $action ="Deposit";

        }
        return [
            'counter' => 1,
            "type" => $action,
            "coin_slug" => $this->coin->coin_slug,
            "coin_name" => $this->coin->coin_name,
            'coin_amount' => $this->coin_qty,
            "coin_ref" => is_object($this->reference_coin) ? $this->reference_coin->coin_name : '',
            "coin_ref_amount" => $this->reference_id_qty,
            "fiat_currency" => $this->fiat_currency,
            "fiat_amount" => number_format($this->fiat_amount, 2),
            "trans_id" => substr($this->trans_id, 0, 3)."****".substr($this->trans_id, strlen($this->trans_id) - strlen($this->trans_id) + 4, strlen($this->trans_id) - strlen($this->trans_id) + 4 ) ,
            "status" => $status,
            'timestamp' => date("Y:m:d H:m:s", strtotime($this->created_at)),
            'status_code' => $this->status,
            "tx_url" => is_object($this->payment) && !empty($this->payment->tx_url) ? $this->payment->tx_url : null,
            'show_link' => is_object($this->payment) && !empty($this->payment->tx_url) ? 1 : 0
        ];
    }
}
