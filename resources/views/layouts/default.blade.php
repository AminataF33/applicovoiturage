<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'App Covoiturage')</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Optional: Algolia Places CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/places.js@1.19.0/dist/cdn/places.min.css" />

    @yield('style')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    @yield('content')

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Algolia Places JS (autocomplétion) -->
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>

    @yield('script')
</body>
</html>
