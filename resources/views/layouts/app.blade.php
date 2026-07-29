<!DOCTYPE html>
<html lang="en">

<head>
<!-- <meta http-equiv="refresh" content="60"> -->
<meta content="60">

    @include('inc.headerLink')
    
</head>

<body class="index-page">
    
@include('inc.header')
    <main class="main">
            @yield('content')
            @include('inc.footer')
        
    </main>
</body>

</html>