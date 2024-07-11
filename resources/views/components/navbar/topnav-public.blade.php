<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <x-navbar.ixp-logo-header />

    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
        class="navbar-toggler">
        <i class="fa fa-ellipsis-v"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="mt-2 mr-auto navbar-nav mt-lg-0">
            @if( config('ixp_fe.customer.details_public') )
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ !request()->is('customer/details', 'customer/associates') ?: 'active' }}"
                        href="#" id="navbarDropdown" role="button" 
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ ucfirst(config('ixp_fe.lang.customer.one')) }} Information
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item {{ request()->is('customer/details') ? 'active' : '' }}"
                            href="{{ route('customer@details') }}">
                            {{ ucfirst(config( 'ixp_fe.lang.customer.one')) }} Details
                        </a>
                        <a class="dropdown-item {{ request()->is('customer/associates') ? 'active' : '' }}"
                            href="{{ route('customer@associates') }}">
                            Associate {{ ucfirst(config('ixp_fe.lang.customer.many')) }}
                        </a>

                        @if( !config('ixp_fe.frontend.disabled.docstore') && \IXP\Models\DocstoreDirectory::getHierarchyForUserClass(\IXP\Models\User::AUTH_PUBLIC) )
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item {{ !request()->is('docstore*') ?: 'active' }}"
                                href="{{ route('docstore-dir@list') }}">
                                Document Store
                            </a>
                        @endif
                    </div>
                </li>
            @endif

            @if( !config('ixp_fe.frontend.disabled.lg') && ixp_min_auth(config('ixp.peering-matrix.min-auth')) && !config('ixp_fe.frontend.disabled.peering-matrix', false) )
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ !request()->is('lg', 'peering-matrix') ?: 'active' }}"
                        href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Peering
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if( !config('ixp_fe.frontend.disabled.lg') )
                            <a class="dropdown-item {{ request()->is('lg') ? 'active' : '' }}"
                                href="{{ url('lg') }}">
                                Looking Glass
                            </a>
                        @endif
                        @if( ixp_min_auth(config('ixp.peering-matrix.min-auth')) && !config('ixp_fe.frontend.disabled.peering-matrix', false) )
                            <a class="dropdown-item {{ request()->is('peering-matrix') ? 'active' : '' }}"
                                href="{{ route('peering-matrix@index') }}">
                                Peering Matrix
                            </a>
                        @endif
                    </div>
                </li>
            @endif

            <li class="nav-item dropdown {{ request()->is('statistics/*', 'weather-map/*') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle"
                    href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Statistics
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if( is_numeric(config('grapher.access.ixp')) && config('grapher.access.ixp') === \IXP\Models\User::AUTH_PUBLIC )
                        <a class="dropdown-item {{ request()->is('statistics/ixp*') ? 'active' : '' }}"
                            href="{{ route( 'statistics@ixp' ) }}">
                            Overall Peering Graphs
                        </a>
                    @endif

                    @if( is_numeric(config('grapher.access.infrastructure')) && config('grapher.access.infrastructure') === \IXP\Models\User::AUTH_PUBLIC )
                        <a class="dropdown-item {{ !request()->is( 'statistics/infrastructure*' ) ?: 'active' }}"
                            href="{{ route( 'statistics@infrastructure' ) }}">
                            Infrastructure Graphs
                        </a>
                    @endif

                    @if( is_numeric( config('grapher.access.vlan')) && config('grapher.access.vlan') === \IXP\Models\User::AUTH_PUBLIC && config('grapher.backends.sflow.enabled') )
                        <a class="dropdown-item {{ !request()->is( 'statistics/vlan*' ) ?: 'active' }}"
                            href="{{ route( 'statistics@vlan' ) }}">
                            VLAN / Per-Protocol Graphs
                        </a>
                    @endif

                    @if( is_numeric(config('grapher.access.location')) && config('grapher.access.location') === \IXP\Models\User::AUTH_PUBLIC )
                        <a class="dropdown-item {{ !request()->is( 'statistics/location' ) ?: 'active' }}"
                            href="{{ route('statistics@location' ) }}">
                            Facility Graphs
                        </a>
                    @endif

                    @if( is_numeric(config('grapher.access.trunk')) && config('grapher.access.trunk') === \IXP\Models\User::AUTH_PUBLIC )
                        @if( count(config('grapher.backends.mrtg.trunks') ?? []) )
                            <a class="dropdown-item {{ !request()->is( 'statistics/trunk*' ) ?: 'active' }}"
                                href="{{ route('statistics@trunk') }}">
                                Inter-Switch / PoP Graphs
                            </a>
                        @elseif( $coreBundle = \IXP\Models\CoreBundle::active()->first() )
                            <a class="dropdown-item {{ !request()->is('statistics/core-bundle') ?: 'active' }}"
                                href="{{ route('statistics@core-bundle', $coreBundle->id) }}">
                                Inter-Switch / PoP Graphs
                            </a>
                        @endif
                    @endif

                    @if( is_numeric(config('grapher.access.switch')) && config('grapher.access.switch') === \IXP\Models\User::AUTH_PUBLIC )
                        <a class="dropdown-item {{ !request()->is('statistics/switch') ?: 'active' }}"
                            href="{{ route('statistics@switch') }}">
                            Switch Aggregate Graphs
                        </a>
                    @endif

                    @inject('grapher', 'IXP\Services\Grapher\Graph\Customer')

                    @if( $grapher->authorisedForAllCustomers() )
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item {{ !request()->is('statistics/members') ?: 'active' }}"
                            href="{{ route('statistics@members') }}">
                            {{ ucfirst(config('ixp_fe.lang.customer.one')) }} Graphs
                        </a>
                    @endif

                    @if( is_array(config('ixp_tools.weathermap', false)) )
                        <div class="dropdown-divider"></div>

                        @foreach( config('ixp_tools.weathermap') as $k => $w )
                            <a class="dropdown-item {{ !request()->is('weather-map/' . $k) ?: 'active' }}"
                                href="{{ route('weathermap' , [ 'id' => $k ]) }}">
                                {{ $w['menu'] }}
                            </a>
                        @endforeach
                    @endif
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ !request()->is( 'public-content/support' ) ?: 'active' }}"
                    href="{{ route('public-content', [ 'page' => 'support' ]) }}">
                    Support
                </a>
            </li>
        </ul>
        <ul class="navbar-nav mt-lg-0">
            <li class="nav-item">
                @if( Auth::check() )
                    <a class="nav-link" href="{{ route('login@logout') }}">
                        Logout
                    </a>
                @else
                    <a class="nav-link" {{ request()->is('login') ? 'style=visibility:hidden' : '' }}
                        href="{{ route('login@showForm') }}">
                        Sign in
                    </a>
                @endif
            </li>
        </ul>
    </div>
</nav>