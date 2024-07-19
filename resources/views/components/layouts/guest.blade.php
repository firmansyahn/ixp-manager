@extends('layouts.app')

@yield('title')

@section('app-headers')
    <link rel="stylesheet" type="text/css" href="{{ url ('') . mix('css/main.css') }}" />
    @section('headers')
    @show
@endsection


@section('content')
    <header>
        <x-navbar.topnav-public />
    </header>

    {{ $slot }}

    <x-layouts.footer-content />
@endsection

@section('app-scripts')
    <script type="text/javascript" src="{{ url ('') . mix('js/main.js') }}"></script>

    @section('scripts')
    @show

    <x-layouts.footer-custom />
@endsection