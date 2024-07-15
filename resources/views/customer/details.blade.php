@php
    $userCheck = Auth::check();
@endphp

@extends('components.layouts.app')

@section('page-header-preamble')
    @if( Auth::check() && Auth::getUser()->isSuperUser() )
        {{ $associates ? ( 'Associate ' . ucfirst( config( 'ixp_fe.lang.customer.many' ) ) )  : ucfirst( config( 'ixp_fe.lang.customer.many' ) ) }}
    @else
        {{ $associates ? 'Associate' : '' }} {{ ucfirst( config( 'ixp_fe.lang.customer.many' ) ) }}
    @endif
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <x-partials.flash-bootstrap />

            <table id='customer-list' class="table table-hover ixpm-table">
                <thead>
                    <tr>
                        <th>
                            {{ ucfirst( config( 'ixp_fe.lang.customer.one' ) ) }}
                        </th>
                        <th class="tw-hidden md:tw-table-cell">
                            Joined
                        </th>

                        @if( !$associates )
                            <th>
                                ASN
                            </th>
                            <th>
                                Peering Policy
                            </th>
                            @if( Auth::check() )
                                <th class="hidden lg:tw-table-cell">
                                    Peering Email
                                </th>
                            @endif
                        @endif
                    </tr>
                <thead>
                <tbody>
                    @foreach( $custs as $customer )
                        <tr>
                            <td>
                                <a href="{{ route ( 'customer@detail' , ['cust' => $customer->id] ) }}">
                                    {{ $customer->name }}
                                </a>

                                @if( !$associates )
                                    @if( $customer->peeringpolicy !== \IXP\Models\Customer::PEERING_POLICY_OPEN )
                                        <span class="tw-hidden lg:tw-inline tw-border-1 tw-p-1 tw-rounded-full tw-float-right tw-text-grey-dark tw-uppercase tw-text-xs">
                                            {{ $customer->peeringpolicy }}
                                        </span>
                                    @endif

                                    @if( $customer->in_manrs )
                                        <a href="https://www.manrs.org/" target="_blank" class="hover:no-underline">
                                            <span class="tw-hidden md:tw-inline tw-border-1 tw-border-green-500 tw-p-1 tw-rounded-full tw-text-green-500 tw-uppercase tw-text-xs tw-mx-3">
                                                MANRS
                                            </span>
                                        </a>
                                    @endif
                                @endif
                            </td>

                            <td class="tw-hidden md:tw-table-cell">
                                {{ \Carbon\Carbon::instance( $customer->datejoin )->format('Y-m-d') }}
                            </td>

                            @if( !$associates )
                                <td>
                                    @if( $customer->in_peeringdb )
                                        @if( Auth::check() )
                                            {{ asNumber($customer->autsys, false) }}
                                        @else
                                            <a href="https://www.peeringdb.com/asn/{{ $customer->autsys }}" target="_peeringdb">
                                                {{ $customer->autsys }}
                                            </a>
                                        @endif
                                    @else
                                        {{ $customer->autsys }}
                                    @endif
                                </td>
                                <td>
                                    {{ $customer->peeringpolicy }}
                                </td>

                                @if( Auth::check() )
                                    <td  class="hidden lg:tw-table-cell">
                                        <a href="mailto:{{ $customer->peeringemail }}">
                                            {{ $customer->peeringemail }}
                                        </a>
                                    </td>
                                @endif
                            @endif
                        </tr>
                    @endforeach
                <tbody>
            </table>
        </div>
    </div>
@endsection

@section( 'scripts' )
    <script>
        $(document).ready( function() {
            $( '#customer-list' ).dataTable( {
                stateSave: true,
                stateDuration : DATATABLE_STATE_DURATION,
                responsive: false,
                "iDisplayLength": 100
            }).show();
        });
    </script>
@endsection