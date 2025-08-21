<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <!-- my icons (feather icons) -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- my font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <!-- my style -->
    @stack('after-styles')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
    @yield('content')
    <!-- javascript -->
    <script src="{{ asset('js/filament/script.js')}}"></script>
    <!-- feather icons -->
    <script>
      feather.replace();
    </script>
    @stack('after-scripts')
  </body>
</html>