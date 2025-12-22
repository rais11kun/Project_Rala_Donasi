<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Landing Page</title>

    <!-- CSS TEMPLATE -->
    <link href="{{ asset('asset-landing/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset-landing/css/style.css') }}" rel="stylesheet">
</head>
<body>

    {{-- NAVBAR --}}
    @include('landing.partials.navbar')

    {{-- HERO --}}
    @include('landing.partials.hero')
    @include('landing.partials.about')
    @include('landing.partials.categories')
    @include('landing.partials.events')
    @include('landing.partials.contact')
    {{-- KONTEN --}}
    <!-- @yield('content') -->

    <!-- JS TEMPLATE -->
    <script src="{{ asset('asset-landing/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset-landing/js/main.js') }}"></script>

</body>
</html>
