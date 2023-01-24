<html>

<head>
  <title>@yield('title')</title>
  <!-- the head -->
  @stack('styles')
</head>

<body>
  <!-- the rest of the page -->
  <!-- the placeholder where stack content will be placed -->

  @yield('content')

  @stack('scripts')
  <h1>This is App</h1>
</body>

</html>
