<?php

namespace IXP\Api\V4\Member;

use IXP\Models\Customer;
use IXP\Api\V4\Logo\LogoResource;
use Illuminate\Http\Resources\Json\JsonResource;
use IXP\Api\V4\VirtualInterface\VirtualInterfaceResource;
use IXP\Api\V4\PhysicalInterface\PhysicalInterfaceResource;

class MemberResource extends JsonResource
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
            'id'                    => $this->id,
            'name'                  => $this->name,
            'slug'                  => $this->shortname,
            'asn'                   => $this->autsys,
            'logo'                  => LogoResource::make($this->whenLoaded('logo')),
            // 'logo'                  => $this->when(
            //     $this->relationLoaded('logo'), 
            //     function () {
            //         $result = new LogoResource($this->logo);

            //         if (empty($result)) {
            //             return 'abs';
            //         }

            //         return $result;
            //     }
            // ),
            'peeringpolicy'         => $this->peeringpolicy,
            'status'                => Customer::$CUST_STATUS_TEXT[$this->status],
            'type'                  => Customer::$CUST_TYPES_TEXT[$this->type],
            'website'               => $this->corpwww,
            'virtual_interfaces'    => VirtualInterfaceResource::collection($this->whenLoaded('virtualInterfaces')),
            'ports'                 => PhysicalInterfaceResource::collection($this->whenLoaded('physicalInterfaces')),
            $this->mergeWhen($request->user()->isCustAdmin(), [
                'created_at'        => $this->created_at,
                'updated_at'        => $this->updated_at,
            ]),
        ];

    }
}
