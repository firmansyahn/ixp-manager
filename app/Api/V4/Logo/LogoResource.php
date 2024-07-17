<?php

namespace IXP\Api\V4\Logo;

use Illuminate\Http\Resources\Json\JsonResource;

class LogoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'customer_id' => $this->customer_id,
            'filename' => $this->stored_name,
        ];

    }
}
