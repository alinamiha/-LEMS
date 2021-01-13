<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.head')
    @yield('head-files')
</head>

<body>
@include('layouts.partials.header')
<div class="content">
    <div class="container">
        @yield('content')
    </div>
</div>
@include('layouts.partials.footer')
@include('layouts.partials.footer-files')
@yield('footer-files')
</body>

</html>
