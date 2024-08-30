<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TickerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'price' => $this->price,
            'qty' => $this->qty,
            'pair' => $this->pair,
            'level' => ($this->type == "bids" ? "red-bg" : 'green-bg') . $this->mrk($this->qty)
        ];
    }

    public function mrk($x)
    {
        if ($x >= 0.5) {
            return "-80";
        } else if ($x >= 0.1) {
            return "-60";
        } else if ($x >= 0.05) {
            return "-40";
        } else if ($x >= 0.01) {
            return "-20";
        } else if ($x >= 0.008) {
            return "-10";
        } else if ($x >= 0.005) {
            return "-8";
        } else if ($x >= 0.001) {
            return "-5";
        } else {
            return '';
        }
    }
}
