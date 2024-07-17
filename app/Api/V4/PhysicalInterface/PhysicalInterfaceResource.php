<?php

namespace IXP\Api\V4\PhysicalInterface;

use Illuminate\Http\Resources\Json\JsonResource;
use IXP\Models\PhysicalInterface;
use IXP\Api\V4\Switch\SwitchPortResource;
use IXP\Api\V4\VirtualInterface\VirtualInterfaceResource;

class PhysicalInterfaceResource extends JsonResource
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
            'id'                         => $this->id,
            'switch_port'                => SwitchPortResource::make($this->whenLoaded('switchPort')),
            'virtual_interfaces'         => VirtualInterfaceResource::collection($this->whenLoaded('virtualInterfaces')),
            'status'                     => PhysicalInterface::$STATES[$this->status],
            'speed'                      => PhysicalInterface::$SPEED[$this->speed],
            'duplex'                     => $this->duplex,
            'rate_limit'                 => $this->rate_limit,
            'auto_negotiation'           => $this->autoneg,
            'fanout_physical_interface'  => $this->fanout_physical_interface_id,
            'notes'                      => $this->notes,
        ];

    }
}


