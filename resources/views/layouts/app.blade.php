<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/feather-icons-web/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/style.css') }}">
    <link rel="icon" href="{{ asset('images/logos/fav.png') }}">
    <title>@yield('title')</title>
    @yield('head')
</head>
<body>

{{--"@popperjs/core": "^2.10.2",--}}

@guest
    @yield('content')
@else
    <section class="main container-fluid">
        <div class="row">
            <!--        sidebar start-->
        @include('layouts.sidebar')
        <!--        sidebar end-->
            <div class="col-12 col-lg-9 col-xl-10 vh-100 py-3 content">
            {{--            header start--}}
            @include('layouts.header')
            {{--    header end--}}
            <!--content Area Start-->
            @yield('content')
            <!--content Area Start-->
            </div>
        </div>
    </section>
@endguest

<script src="{{ asset('dashboard/vendor/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('dashboard/js/app.js') }}"></script>

@yield('foot')
</body>
</html>





















