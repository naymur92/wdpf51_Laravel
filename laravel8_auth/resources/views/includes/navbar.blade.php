<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      {{-- left navbar --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">Home</a>
      </li>
    </ul>

    {{-- Right navbar --}}
    <ul class="navbar-nav">
      @if (Route::has('login'))
        @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ url('dashboard') }}">Dashboard</a>
          </li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <button type="submit" class="btn btn-danger">Logout</button>
            </form>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ url('login') }}">Login</a>
          </li>
          @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ url('register') }}">Register</a>
            </li>
          @endif
        @endauth
      @endif
    </ul>
  </div>
</nav>
