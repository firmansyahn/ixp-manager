@props(['title'])

<!DOCTYPE html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- IXP MANAGER - template directory: resources/[views|skins] --}}

        <base href="{{ url('') }}/index.php">

        <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
        <meta charset="utf-8">

        <title>{{ isset($title) ? $title . ' | ' . config('identity.sitename') : config('identity.sitename') }}</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" type="text/css" href="{{ url ('') . mix('css/ixp-pack.css') }}" />
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" /> --}}
        <link rel="shortcut icon" type="image/ico" href="{{ file_exists( base_path( 'public/favicon.ico' ) ) ? asset( "favicon.ico" ) : asset( "favicon.ico.dist" ) }}" />
        {{-- @vite(['resources/css/main.css']) --}}

        @section('headers')
    </head>

    <body class="d-flex flex-column h-100 font-weight-normal">
        <header>
            @php
            use IXP\Models\User;
            
            /*
             * We used to manage these menus with a lot of if / elseif / else clauses. It was a mess.
             * Despite the drawbacks of replication, it's easier - by a distance - to mainatin standalone
             * menu templates per user type:
             */
            $authCheck  = Auth::check();
            if( $authCheck ){
                $is2faAuthRequiredForSession = Auth::getUser()->is2faAuthRequiredForSession();
                $privs      = Auth::getUser()->privs();
            }
            @endphp

            @if( !$authCheck || Session::exists( "2fa-" . Auth::id() ) )
                @include("layouts.menus.public");
            @elseif( $privs === User::AUTH_CUSTUSER && Auth::getUser()->customer->typeAssociate() )
                @include("layouts/menus/associate");
            @elseif( $privs === User::AUTH_CUSTADMIN )
                @include( "layouts/menus/custadmin" );
            @elseif( $privs === User::AUTH_CUSTUSER )
                @include("layouts.menus.custuser");
            @elseif( $privs === User::AUTH_SUPERUSER )
                @include("layouts.menus.superuser");
            @endif
        </header>

        <div class="container-fluid">
            <div class="row" >

                @if( $authCheck && $privs === User::AUTH_SUPERUSER && !$is2faAuthRequiredForSession )
                    @yield('layouts-menu')
                @endif

                <div id="slide-reveal-overlay" class="collapse"></div>
                @if( $authCheck && $privs === User::AUTH_SUPERUSER && !$is2faAuthRequiredForSession )
                    <main role="main" id="main-div" class="pb-4 mt-2 col-md-9 ml-sm-auto col-lg-9 col-xl-10">
                 @else
                    <main role="main" id="main-div" class="pb-4 mt-2 col-md-10 mx-sm-auto">
                @endif
                      <div class="flex-wrap pt-3 pb-2 mb-3 d-flex justify-content-between flex-md-nowrap align-items-center border-bottom">
                          <h3>
                              @section('page-header-preamble')
                          </h3>
                          <div class="mb-2 ml-auto btn-toolbar mb-md-0">
                              @section('page-header-postamble')
                          </div>
                      </div>

                      <div class="container-fluid">
                          <div class="col-sm-12">
                              @section('content')
                              @show
                          </div>
                      </div>
                  </main>
            </div> <!-- </div class="row"> -->
        </div> <!-- </div class="container"> -->

        @include('layouts.base.footer-content')

        <script>
            const WHOIS_ASN_URL             = "{{ url("api/v4/aut-num") }}";
            const WHOIS_PREFIX_URL          = "{{ url("api/v4/prefix-whois") }}";
            const MARKDOWN_URL              = "{{ route("utils@markdown") }}";
            const DATATABLE_STATE_DURATION  = 0;
        </script>
        <script type="text/javascript" src="{{ url ('') . mix('js/ixp-pack.js') }}"></script>
        <script>
            // Focus on search input when opening dropdown
            $( document ).on('select2:open', () => {
                document.querySelector( '.select2-search__field' ).focus();
            });

            $( ".chzn-select" ).select2( { width: '100%', placeholder: function() {
                $( this ).data( 'placeholder' );
            }});

            $( ".chzn-select-tag" ).select2( { width: '100%', tags: true, placeholder: function() {
                $( this ).data( 'placeholder' );
            }});

            $( ".chzn-select-deselect" ).select2( { width: '100%', allowClear: true, placeholder: function() {
                $( this ).data('placeholder' );
            }});

            $( ".chzn-select-deselect-tag" ).select2( { width: '100%', allowClear: true, tags: true, placeholder: function() {
                $( this ).data( 'placeholder' );
            }});

            @if( $authCheck && $privs === User::AUTH_SUPERUSER )
                $( "#menu-select-customer" ).select2({ width: '100%',placeholder: "Jump to {{ config( 'ixp_fe.lang.customer.one' ) }}...", allowClear: true }).change( function(){
                    document.location.href = '{{ url( "/customer/overview" ) }}/' + $( "#menu-select-customer" ).val();
                });

                $('#sidebarCollapse').click( function () {
                    sidebar();
                });

                $( '#navbar-ixp' ).click( function () {
                    if ($('#side-navbar').hasClass( 'active' ) ) {
                        sidebar();
                    }
                });

                $(document).on('keyup',function( evt ) {
                    if (evt.keyCode === 27) {
                        if ($('#side-navbar').hasClass( 'active' ) ) {
                            sidebar();
                        }
                    }
                });

                function sidebar(){
                    if( $( '#navbar-ixp' ).attr( 'aria-expanded' ) == 'true' ) {
                        $('#navbar-ixp').click();
                    }

                    $('#menu-icon').toggleClass('fa-bars').toggleClass('fa-times');
                    $('#side-navbar').toggleClass('active');
                    $('#slide-reveal-overlay').toggleClass('collapse');
                    $('body').toggleClass('overflow-hidden');
                }
            @endif

            $('[data-toggle="tooltip"]').tooltip();

        </script>

        @section('scripts')

        @include('layouts.base.footer-custom')

        {{-- @vite(['resources/js/main.js']) --}}
    </body>
</html>