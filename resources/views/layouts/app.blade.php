<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Products | Dashboard</title>
        @include('libraries.styles')
    </head>
    <body class="font-sans antialiased">
        @include('components.nav')
        @yield('content')

        @include('libraries.scripts')
        @include('components.footer')
    </body>
</html>

