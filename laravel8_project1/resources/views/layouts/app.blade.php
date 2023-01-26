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
  @section('sidebar')
    <p>This is the app sidebar.</p>
  @show

  @yield('content')

  @stack('scripts')
</body>

</html>
