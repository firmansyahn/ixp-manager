<?php

namespace IXP\Http\Controllers\Api\V4\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ListCustomerResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->shortname,
            'asn' => $this->autsys,
            'logo' => LogoResource::make($this->whenLoaded('logo')),
            'website' => $this->corpwww,
        ];

    }
}
