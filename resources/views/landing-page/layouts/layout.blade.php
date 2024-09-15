<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/icons/lsp-polinema-ico.png') }}" type="image/x-icon">

    <!-- Map CSS -->
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/libs.bundle.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <!--Apex charts-->
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/apexcharts') }}"></script>
    <link rel="stylesheet" href="{{ asset('charts/graph_chart.css') }}">
    
    <base href="../" />

    <!-- Title -->
    <title>@yield('title', 'Default Title')</title>
  </head>
  <body>
    <!-- Header -->
    @include('landing-page.layouts.header')

    <!-- Main Content -->
    <div>
        @yield('content')
    </div>

    <!-- Footer -->
    @include('landing-page.layouts.footer')

    <!-- JAVASCRIPT -->
    <!-- Map JS -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>

    <!-- Vendor JS -->
    <script src="{{ asset('assets/js/vendor.bundle.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.bundle.js') }}"></script>
    <script src="{{ asset('charts/charts_home.js') }}"></script>

    {{-- keen --}}

</body>
</html>
