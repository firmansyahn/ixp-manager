<?php

namespace IXP\Http\Controllers\Api\V4;

/*
 * Copyright (C) 2009 - 2021 Internet Neutral Exchange Association Company Limited By Guarantee.
 * All Rights Reserved.
 *
 * This file is part of IXP Manager.
 *
 * IXP Manager is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation, version v2.0 of the License.
 *
 * IXP Manager is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for
 * more details.
 *
 * You should have received a copy of the GNU General Public License v2.0
 * along with IXP Manager.  If not, see:
 *
 * http://www.gnu.org/licenses/gpl-2.0.html
 */

use IXP\Models\SwitchPort;

use Illuminate\Http\JsonResponse;
use IXP\Api\V4\Member\MemberResource;
use IXP\Api\V4\PhysicalInterface\PhysicalInterfaceResource;
use IXP\Api\V4\Switch\SwitchPortResource;
use IXP\Api\V4\Switch\SwitchResource;
use IXP\Api\V4\VirtualInterface\VirtualInterfaceResource;

/**
 * SwitchPort Controller
 *
 * @author     Barry O'Donovan <barry@islandbridgenetworks.ie>
 * @author     Yann Robin <yann@islandbridgenetworks.ie>
 * @category   APIv4
 * @package    IXP\Http\Controllers\Api\V4
 * @copyright  Copyright (C) 2009 - 2021 Internet Neutral Exchange Association Company Limited By Guarantee
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU GPL V2.0
 */
class SwitchPortController extends Controller
{
    /**
     * Get the customer for a switch port
     *
     * @param   SwitchPort $sp The ID of the switch port to query
     *
     * @return  JsonResponse JSON customer object
     */
    public function customer(SwitchPort $switchport): JsonResponse
    {
        return response()->json( [
            'customer' =>  SwitchPort::selectRaw( 'COUNT( c.id ) as nb, c.id, c.name' )
                ->from( 'switchport AS sp' )
                ->leftJoin( 'physicalinterface AS pi', 'pi.switchportid', 'sp.id' )
                ->leftJoin( 'virtualinterface AS vi', 'vi.id', 'pi.virtualinterfaceid' )
                ->leftJoin( 'cust AS c', 'c.id', 'vi.custid' )
                ->where( 'sp.id', $switchport->id )
                ->groupBy( 'c.id' )
                ->first()->toArray()
        ] );
    }

    /**
     * Check if the switch port has a physical interface set
     *
     * @param   SwitchPort $switchport  Id of the switchport
     * @return  JsonResponse JSON response
     */
    public function physicalInterface(SwitchPort $switchport): JsonResponse
    {
        if( ( $pi = $switchport->physicalInterface ) ){
            return response()->json([
                'pi' => [
                    'id'         => $pi->id,
                    'status'     => $pi->status,
                    'statusText' => $pi->status(),
                ]
            ]);
        }
        return response()->json( [] );
    }

    /**
     * Display a listing of the switch port Device resource.
     *
     * @param  \IXP\Models\SwitchPort       $switchport
     * @return \Illuminate\Http\Response
     */
    public function device(SwitchPort $switchport)
    {
        $device = $switchport->switcher;

        return SwitchResource::make($device);
    }

    /**
     * Display a listing of the switch port Member resource.
     *
     * @param  \IXP\Models\SwitchPort       $switchport
     * @return \Illuminate\Http\Response
     */
    public function member(SwitchPort $switchport)
    {
        $member = $switchport->physicalInterface->virtualInterface->customer;

        return MemberResource::make($member);
    }

    /**
     * Display a listing of the switch port Physical Interface resource.
     *
     * @param  \IXP\Models\SwitchPort       $switchport
     * @return \Illuminate\Http\Response
     */
    public function port(SwitchPort $switchport)
    {
        $port = $switchport->physicalInterface;

        return PhysicalInterfaceResource::make($port);
    }

    /**
     * Display the specified resource.
     *
     * @param  \IXP\Models\SwitchPort       $switchport
     * @return \Illuminate\Http\Response
     */
    public function show(SwitchPort $switchport)
    {
        $switchport->load(['switcher', 'physicalInterface', 'patchPanelPort']);

        return SwitchPortResource::make($switchport);
    }
}