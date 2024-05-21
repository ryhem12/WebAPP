<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>
<body>
    <div class="dashboard-container">
        @include('partials.sidebar')
        <div class="main-content">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    @yield('scripts')
</body>
</html>
