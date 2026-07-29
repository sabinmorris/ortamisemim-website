<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Or-tamisemim') }}</title>

    
    <link rel="stylesheet" href="{{ asset('assets_admin/css/style.css')}}">
    @include('admin.ainc.headerLink')
    <link rel="stylesheet" href="{{asset('assets_admin/css/toggleswitchery.css')}}">
    <script src="{{ asset('assets_admin/js/toggleswitchery.js')}}"></script>
    

</head>

<body class="nav-md">
    <div class="app">
        <main class="py-4">
            @yield('content')
            <!-- footer content -->
            @include('admin.ainc.footer')
            <!-- /footer content -->
        </main>
    </div>   
</body>

</html>