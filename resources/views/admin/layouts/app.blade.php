<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>

    {{-- Argon CSS --}}
    <link href="{{ asset('asset-admin/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
</head>

<body class="g-sidenav-show bg-gray-100">

    {{-- Sidebar --}}
    @include('admin.layouts.sidebar')

    <main class="main-content position-relative border-radius-lg">
        {{-- Navbar --}}
        @include('admin.layouts.navbar')

        <div class="container-fluid py-4">
            @yield('content')
        </div>

        {{-- Footer --}}
        @include('admin.layouts.footer')
    </main>

    {{-- Argon JS --}}
    <script src="{{ asset('asset-admin/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('asset-admin/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset-admin/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
</body>
</html>
