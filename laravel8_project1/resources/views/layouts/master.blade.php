<html>

<head>
  <title>My Site | @yield('title', 'Home Page')</title>
</head>

<body>
  <h1>This is master</h1>
  <div class="container">
    @yield('content')
  </div>
  @section('footerScripts')
    <script src="app.js"></script>
  @show
</body>

</html>
