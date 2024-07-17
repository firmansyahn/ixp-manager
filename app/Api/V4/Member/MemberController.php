<?php

namespace IXP\Api\V4\Member;

use IXP\Models\Customer;
use IXP\Api\V4\Controller;
use Illuminate\Http\Request;
use IXP\Api\V4\Member\MemberResource;
use IXP\Api\V4\PhysicalInterface\PhysicalInterfaceResource;
use IXP\Api\V4\VirtualInterface\VirtualInterfaceResource;

class MemberController extends Controller
{
    /**
     * Display a listing of the Member resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Customer::with('logo', 'virtualInterfaces')->get();

        return MemberResource::collection($members);
    }

    /**
     * Get member list
     *
     * @return \IXP\Api\V4\Member\MemberResource
     */
    public function list()
    {
        // $this->authorize(auth()->check());

        // $customers = Customer::with(['logo' => function ($query) {
        //         $query->select('customer_id', 'stored_name');
        //     }])->get();

        $members = Customer::with('logo', 'virtualInterfaces', 'physicalInterfaces')->get();

        // return response()->json($members);
        return MemberResource::collection($members);
    }

    /**
     * Display a listing of the member Virtual Interface resource.
     *
     * @param  Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function vifs(Customer $customer)
    {
        $vifs = $customer->virtualInterfaces()->get();

        return VirtualInterfaceResource::collection($vifs);
    }

    /**
     * Display a listing of the member Physical Interface resource.
     *
     * @param  Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function ports(Customer $customer)
    {
        $ports = $customer->physicalInterfaces()->with(['switchPort.switcher'])->get();

        return PhysicalInterfaceResource::collection($ports);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request     $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \IXP\Models\Customer         $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $customer->load(['logo', 'virtualInterfaces', 'physicalInterfaces']);

        return MemberResource::make($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request     $request
     * @param  \IXP\Models\Customer         $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \IXP\Models\Customer         $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
