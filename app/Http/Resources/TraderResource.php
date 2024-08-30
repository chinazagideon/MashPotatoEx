<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TraderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $profit =  number_format($this->total_profit,5);
        return [
            'amount' => $this->amount,
            'trade_time' => $this->trade_time,
            'time' => date("H:m:s", strtotime($this->created_at)),
            'type' => ($this->trade_type),
            'profit' => $profit,
            'exchange' => $this->exchange,
            'pair' => $this->pair,
            'qty' => number_format($this->amount,2),
            'refcode' => $this->refcode,
            'currency' => $this->currency,
            'invite_profit' => $this->invite_profit,
        ];
    }
}
