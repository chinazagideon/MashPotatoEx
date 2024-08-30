<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MarketResource extends JsonResource
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
            "markPrice" => round($this->markPrice, 5),
            'dailyChange' => round($this->dailyChange, 4),
            "displayName" => $this->displayName,
            'symbol' => $this->symbol
        ];

    }
}
