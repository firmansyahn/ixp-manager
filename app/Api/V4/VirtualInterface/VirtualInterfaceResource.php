<?php

namespace IXP\Api\V4\VirtualInterface;

use Illuminate\Http\Resources\Json\JsonResource;
use IXP\Api\V4\PhysicalInterface\PhysicalInterfaceResource;

class VirtualInterfaceResource extends JsonResource
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
            'id'            => $this->id,
            'member_id'     => $this->custid,
            'name'          => $this->name,
            'description'   => $this->description,
            'ports'         => PhysicalInterfaceResource::collection($this->whenLoaded('physicalInterfaces')),
        ];

    }
}
