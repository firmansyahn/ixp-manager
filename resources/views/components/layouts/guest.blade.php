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
        <link rel="shortcut icon" type="image/ico" href="{{ file_exists(base_path('public/favicon.ico')) ? asset("favicon.ico") : asset("favicon.ico.dist") }}" />
        {{-- @vite(['resources/css/main.css']) --}}

        @section('headers')
    </head>

    <body class="d-flex flex-column h-100 font-weight-normal">
        <header>
            {{-- @include("layouts.menus.public"); --}}
            <x-partials.menu-public />
        </header>

        <div class="container-fluid">
            <div class="row" >

                    <main role="main" id="main-div" class="pb-4 mt-2 col-md-10 mx-sm-auto">

                        <div class="flex-wrap pt-3 pb-2 mb-3 d-flex justify-content-between flex-md-nowrap align-items-center border-bottom">
                            <h3>
                                {{ $title }}
                            </h3>
                            <div class="mb-2 ml-auto btn-toolbar mb-md-0">
                                @section('page-header-postamble')
                            </div>
                        </div>
                    
                        <div class="container-fluid">
                            <div class="col-sm-12">
                                {{ $slot }}
                            </div>
                        </div>
                  </main>
            </div> <!-- </div class="row"> -->
        </div> <!-- </div class="container"> -->

        @include('layouts.base.footer-content')

        <script type="text/javascript" src="{{ url ('') . mix('js/ixp-pack.js') }}"></script>

        @section('scripts')

        @include('layouts.base.footer-custom')

        {{-- @vite(['resources/js/main.js']) --}}
    </body>
</html>