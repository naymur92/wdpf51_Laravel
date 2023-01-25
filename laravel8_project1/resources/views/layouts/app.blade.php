<html>

<head>
  <title>@yield('title')</title>
  <!-- the head -->
  @stack('styles')
</head>

<body>
  <!-- the rest of the page -->
  <!-- the placeholder where stack content will be placed -->
  {{-- <h1>This is App</h1> --}}

  @yield('content')

  @stack('scripts')
</body>

</html>
