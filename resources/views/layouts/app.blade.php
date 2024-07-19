@props(['title'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ isset($title) ? $title . ' | ' . config('identity.sitename') : config('identity.sitename') }}</title>

        <link rel="shortcut icon" type="image/ico" href="{{ file_exists(base_path('public/favicon.ico')) ? asset("favicon.ico") : asset("favicon.ico.dist") }}" />

        @section('app-headers')
        @show
        {{-- @vite(['resources/css/main.css']) --}}
    </head>

    <body id="app"
        class="h-screen antialiased bg-gray-50 dark:bg-gray-900">

        @section('content')
        @show

        @section('app-scripts')
        @show

        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
        {{-- @vite(['resources/css/main.js']) --}}
    </body>
</html>