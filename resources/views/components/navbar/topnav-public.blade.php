<nav class="px-4 lg:px-6 py-2.5">
    <div class="flex flex-wrap items-center justify-between mx-auto md:px-4 max-w-screen">
        <div class="flex md:hidden"></div>
        <a href="{{ route('login@showForm') }}" class="items-center hidden md:flex">
            <img src="{{ config("identity.biglogo") }}" class="h-6 mr-3 sm:h-9" alt="Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">MONICA</span>
        </a>

        <div class="flex items-center md:order-2">
            <a href="{{ route('login@showForm') }}"
                class="text-pink-600 bg-pink-100 dark:text-white hover:bg-pink-700 hover:text-white focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                Log in
            </a>
            <button data-collapse-toggle="mobile-menu-2" type="button" 
                class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" />
                </svg>
                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"  />
                </svg>
            </button>
        </div>

        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
            <ul class="flex flex-col mt-4 font-medium md:flex-row md:space-x-8 md:mt-0">
                @if( config('ixp_fe.customer.details_public') )
                    <li>
                        <x-dropdown.button id="dropdownMemberInformationButton" toggle="dropdown-member-information" trigger="hover">
                            {{ ucfirst(config('ixp_fe.lang.customer.one')) }} Information
                        </x-dropdown.button>
                            
                        <x-dropdown.items toggle="dropdown-member-information">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownCustomerDetailsButton">
                                <li>
                                    <x-dropdown.item href="{{ route('customer@details') }}"
                                        class="{{ request()->is('customer/details') ? 'active' : '' }}">
                                        {{ ucfirst(config( 'ixp_fe.lang.customer.one')) }} Details
                                    </x-dropdown.item>
                                </li>
                                <li>
                                    <x-dropdown.item href="{{ route('customer@associates') }}"
                                        class="{{ request()->is('customer/associates') ? 'active' : '' }}">
                                        Associate {{ ucfirst(config('ixp_fe.lang.customer.many')) }}
                                    </x-dropdown.item>
                                </li>
                            </ul>
                            @if( !config('ixp_fe.frontend.disabled.docstore') && \IXP\Models\DocstoreDirectory::getHierarchyForUserClass(\IXP\Models\User::AUTH_PUBLIC) )
                                <div class="py-2">
                                    <x-dropdown.item href="{{ route('docstore-dir@list') }}"
                                        class="{{ !request()->is('docstore*') ?: 'active' }}">
                                        Document Store
                                    </x-dropdown.item>
                                </div>
                            @endif
                        </x-dropdown.items>
                    </li>
                @endif

                @if( !config('ixp_fe.frontend.disabled.lg') && ixp_min_auth(config('ixp.peering-matrix.min-auth')) && !config('ixp_fe.frontend.disabled.peering-matrix', false) )
                <li>
                    <x-dropdown.button id="dropdownPeeringButton" toggle="dropdown-peering" trigger="hover">
                        Peering
                    </x-dropdown.button>
                        
                    <x-dropdown.items toggle="dropdown-peering">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownPeeringButton">
                            @if( !config('ixp_fe.frontend.disabled.lg') )
                            <li>
                                <x-dropdown.item href="{{ url('lg') }}"
                                    class="{{ request()->is('lg') ? 'active' : '' }}">
                                    Looking Glass
                                </x-dropdown.item>
                            </li>
                            @endif
                            @if( ixp_min_auth(config('ixp.peering-matrix.min-auth')) && !config('ixp_fe.frontend.disabled.peering-matrix', false) )
                            <li>
                                <x-dropdown.item href="{{ route('peering-matrix@index') }}"
                                    class="{{ request()->is('peering-matrix') ? 'active' : '' }}">
                                    Peering Matrix
                                </x-dropdown.item>
                            </li>
                            @endif
                        </ul>
                    </x-dropdown.items>
                </li>
                @endif

                <li class="{{ request()->is('statistics/*', 'weather-map/*') ? 'active' : '' }}">
                    <x-dropdown.button id="dropdownStatisticButton" toggle="dropdown-statistics" trigger="hover">
                        Statistics
                    </x-dropdown.button>

                    <x-dropdown.items toggle="dropdown-statistics">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownPeeringButton">

                            @if( is_numeric(config('grapher.access.ixp')) && config('grapher.access.ixp') === \IXP\Models\User::AUTH_PUBLIC )
                            <li>
                            <x-dropdown.item class="{{ request()->is('statistics/ixp*') ? 'active' : '' }}"
                                href="{{ route( 'statistics@ixp' ) }}">
                                Overall Peering Graphs
                            </x-dropdown.item>
                            </li>
                            @endif

                            @if( is_numeric(config('grapher.access.infrastructure')) && config('grapher.access.infrastructure') === \IXP\Models\User::AUTH_PUBLIC )
                            <li>
                                <x-dropdown.item class="{{ !request()->is( 'statistics/infrastructure*' ) ?: 'active' }}"
                                    href="{{ route( 'statistics@infrastructure' ) }}">
                                    Infrastructure Graphs
                                </x-dropdown.item>
                            </li>
                            @endif

                            @if( is_numeric(config('grapher.access.vlan')) && config('grapher.access.vlan') === \IXP\Models\User::AUTH_PUBLIC && config('grapher.backends.sflow.enabled') )
                            <li>
                                <x-dropdown.item class="{{ !request()->is( 'statistics/vlan*' ) ?: 'active' }}"
                                    href="{{ route( 'statistics@vlan' ) }}">
                                    VLAN / Per-Protocol Graphs
                                </x-dropdown.item>
                            </li>
                            @endif

                            @if( is_numeric(config('grapher.access.location')) && config('grapher.access.location') === \IXP\Models\User::AUTH_PUBLIC )
                            <li>
                            <x-dropdown.item class="{{ !request()->is( 'statistics/location' ) ?: 'active' }}"
                                href="{{ route('statistics@location' ) }}">
                                Facility Graphs
                            </x-dropdown.item>
                            </li>
                            @endif
        
                            @if( is_numeric(config('grapher.access.trunk')) && config('grapher.access.trunk') === \IXP\Models\User::AUTH_PUBLIC )
                            <li>
                                @if( count(config('grapher.backends.mrtg.trunks') ?? []) )
                                    <x-dropdown.item class="{{ !request()->is( 'statistics/trunk*' ) ?: 'active' }}"
                                        href="{{ route('statistics@trunk') }}">
                                        Inter-Switch / PoP Graphs
                                    </x-dropdown.item>
                                @elseif( $coreBundle = \IXP\Models\CoreBundle::active()->first() )
                                    <x-dropdown.item class="{{ !request()->is('statistics/core-bundle') ?: 'active' }}"
                                        href="{{ route('statistics@core-bundle', $coreBundle->id) }}">
                                        Inter-Switch / PoP Graphs
                                    </x-dropdown.item>
                                @endif
                            </li>
                            @endif
        
                            @if( is_numeric(config('grapher.access.switch')) && config('grapher.access.switch') === \IXP\Models\User::AUTH_PUBLIC )
                            <li>
                                <x-dropdown.item class="{{ !request()->is('statistics/switch') ?: 'active' }}"
                                    href="{{ route('statistics@switch') }}">
                                    Switch Aggregate Graphs
                                </x-dropdown.item>
                            </li>
                            @endif

                            @inject('grapher', 'IXP\Services\Grapher\Graph\Customer')

                            @if( $grapher->authorisedForAllCustomers() )
                            <div class="py-2">
                                <x-dropdown.item class="{{ !request()->is('statistics/members') ?: 'active' }}"
                                    href="{{ route('statistics@members') }}">
                                    {{ ucfirst(config('ixp_fe.lang.customer.one')) }} Graphs
                                </x-dropdown.item>
                            @endif
        
                            @if( is_array(config('ixp_tools.weathermap', false)) )
                            <div class="py-2">
                                @foreach( config('ixp_tools.weathermap') as $k => $w )
                                    <x-dropdown.item class="{{ !request()->is('weather-map/' . $k) ?: 'active' }}"
                                        href="{{ route('weathermap' , [ 'id' => $k ]) }}">
                                        {{ $w['menu'] }}
                                    </x-dropdown.item>
                                @endforeach
                            </div>
                            @endif
                        </ul>
                    </x-dropdown.items>
                </li>

                <li>
                    <x-dropdown.button  href="{{ route('public-content', ['page' => 'support']) }}"
                        class="{{ !request()->is('public-content/support') ?: 'active' }}">
                        Support
                    </x-dropdown.button>
                </li>
            </ul>
        </div>
    </div>
</nav>