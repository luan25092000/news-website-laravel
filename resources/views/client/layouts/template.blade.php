<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    @include('client.inc.style')
    @yield('css')
</head>

<body>
    @include('client.inc.header')
    @yield('main')
    @include('client.inc.footer')
</body>

</html>