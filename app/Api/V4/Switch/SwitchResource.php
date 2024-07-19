<?php

namespace IXP\Api\V4\Switch;

use Illuminate\Http\Resources\Json\JsonResource;
use IXP\Api\V4\Vendor\VendorResource;

class SwitchResource extends JsonResource
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
            'id'                => $this->id,
            'rack'              => $this->cabinetid,
            'vendor'            => VendorResource::make($this->whenLoaded('vendor'))->name,
            'name'              => $this->name,
            'infrastructure'    => $this->infrastructure,
        ];

    }
}
