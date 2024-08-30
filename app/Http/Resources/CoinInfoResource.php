<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CoinInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "price" =>$this->price > 0 ?  number_format($this->price,2): $this->price,
            'image' => "https://www.cryptocompare.com/".strtolower($this->image_url),
            "coinslug" => $this->coin->coin_slug,
            "percent_change_24h" => $this->percent_change_24h,
            "coinname" => $this->coin->coin_name,
            "chartUrl" => route('view_chart',['slug' => $this->coin->coin_slug])
        ];
    }
}
