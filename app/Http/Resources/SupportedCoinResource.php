<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupportedCoinResource extends JsonResource
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
            "coin_name" => $this->coin_name,
            "coin_slug" => $this->coin_slug,
            "fee" => $this->fee,
            "threshold" => $this->threshold

        ];
    }
}
