<?php

namespace IXP\Api\V4\Switch;

use Illuminate\Http\Resources\Json\JsonResource;
use IXP\Api\V4\PhysicalInterface\PhysicalInterfaceResource;
use IXP\Models\SwitchPort;

class SwitchPortResource extends JsonResource
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
            'type'              => SwitchPort::$TYPES[$this->type],
            'name'              => $this->name,
            'ifName'            => $this->ifName,
            'ifAlias'           => $this->ifAlias,
            'ifHighSpeed'       => $this->ifHighSpeed,
            'ifMtu'             => $this->ifMtu,
            'ifPhysAddress'     => $this->ifPhysAddress,
            'ifAdminStatus'     => $this->ifAdminStatus,
            'ifOperStatus'      => $this->ifOperStatus,
            'ifLastChange'      => $this->ifLastChange,
            'lastSnmpPoll'      => $this->lastSnmpPoll,
            'ifIndex'           => $this->ifIndex,
            'lagIfIndex'        => $this->lagIfIndex,
            'mau'               => [
                'type'                  => $this->mauType,
                'state'                 => $this->mauState,
                'availability'          => $this->mauAvailability,
                'jack_type'             => $this->mauJacktype,
                'autonego_supported'    => $this->mauAutoNegSupported,
                'autonego_admin_state'  => $this->mauAutoNegAdminState,
            ],
            'active'            => $this->active,
            'switch'            => SwitchResource::make($this->whenLoaded('switcher')),
            'infrastructure'    => $this->infrastructure,
            'port'              => PhysicalInterfaceResource::make($this->whenLoaded('physicalInterface'))
        ];

    }
}
