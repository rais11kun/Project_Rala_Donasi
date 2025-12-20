<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>@yield('title', 'Admin Dashboard')</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

  <!-- Argon CSS -->
  <link href="{{ asset('asset-admin/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">

  {{-- SIDEBAR --}}
  @include('admin.layouts.sidebar')

  <main class="main-content position-relative border-radius-lg ">

    {{-- NAVBAR --}}
    @include('admin.layouts.navbar')

    {{-- CONTENT --}}
    <div class="container-fluid py-4">
        @yield('content')
    </div>

    {{-- FOOTER --}}
    @include('admin.layouts.footer')
  </main>

  <!-- Argon JS -->
  <script src="{{ asset('asset-admin/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('asset-admin/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('asset-admin/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
  <script src="{{ asset('asset-admin/js/plugins/chartjs.min.js') }}"></script>
    @yield('scripts')
</body>
</html>
